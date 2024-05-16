<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Barryvdh\DomPDF\Facade\Pdf;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory as WordIOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Carbon\Carbon;

class ReporteController extends Controller
{
    public function showForm()
    {
        return view('reportes.create');
    }
    public function generate(Request $request)
    {
        $producto = Producto::where('clave_cucop', $request->clave_cucop)
                        ->with(['unidade', 'entradas' => function($query) use ($request) {
                            $query->whereBetween('fecha_entrada', [$request->fecha_inicio, $request->fecha_fin]);
                        }, 'salidas' => function($query) use ($request) {
                            $query->whereBetween('fecha_salida', [$request->fecha_inicio, $request->fecha_fin]);
                        }])
                        ->first();
        if (!$producto) {
            return back()->with('error', 'No se pudo encontrar el producto o no es posible generar el reporte.');
        }

        $totalEntradas = $producto->entradas->sum('cantidad_entrada');
        $totalSalidas = $producto->salidas->sum('cantidad_salida');
        $totalDisponible = $producto->cantidad - $totalSalidas + $totalEntradas;

        if ($request->formato == 'pdf') {
            $pdf = PDF::loadView('reportes.pdf', compact('producto', 'totalEntradas', 'totalSalidas', 'totalDisponible'));
            return $pdf->download('reporte.pdf');
        } elseif ($request->formato == 'word') {
            $phpWord = new PhpWord();
            $section = $phpWord->addSection();
            $section->addText("Reporte de Producto", ['bold' => true, 'size' => 16]);
            $section->addText("Nombre: {$producto->nombre_articulo}", ['size' => 12]);
            $section->addText("Descripción: {$producto->descripcion}", ['size' => 12]);
            $section->addText("Clave CUCOP: {$producto->clave_cucop}", ['size' => 12]);
            $section->addText("Unidad de Medida: {$producto->unidade->unidad_medida}", ['size' => 12]);
            $section->addText("Total Entradas: {$totalEntradas}", ['size' => 12]);
            $section->addText("Total Salidas: {$totalSalidas}", ['size' => 12]);
            $section->addText("Total Disponible: {$totalDisponible}", ['size' => 12]);

            $tableEntradas = $section->addTable();
            $tableEntradas->addRow();
            $tableEntradas->addCell(5000)->addText("Fecha de Entrada");
            $tableEntradas->addCell(5000)->addText("Cantidad Entrada");

            foreach ($producto->entradas as $entrada) {
                $fecha = new Carbon($entrada->fecha_entrada);
                $tableEntradas->addRow();
                $tableEntradas->addCell(5000)->addText($fecha->toDateString());
                $tableEntradas->addCell(5000)->addText($entrada->cantidad_entrada);
            }

            $tableSalidas = $section->addTable();
            $tableSalidas->addRow();
            $tableSalidas->addCell(5000)->addText("Fecha de Salida");
            $tableSalidas->addCell(5000)->addText("Cantidad Salida");

            foreach ($producto->salidas as $salida) {
                $fechaSalida = new Carbon($salida->fecha_salida);
                $tableSalidas->addRow();
                $tableSalidas->addCell(5000)->addText($fechaSalida->toDateString());
                $tableSalidas->addCell(5000)->addText($salida->cantidad_salida);
            }

            $writer = WordIOFactory::createWriter($phpWord, 'Word2007');
            $filename = 'reporte.docx';
            header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
            header('Content-Disposition: attachment;filename="'. $filename .'"');
            $writer->save('php://output');
            exit;
        } elseif ($request->formato == 'excel') {
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setCellValue('A1', 'Nombre');
            $sheet->setCellValue('B1', $producto->nombre_articulo);
            $sheet->setCellValue('A2', 'Descripción');
            $sheet->setCellValue('B2', $producto->descripcion);
            $sheet->setCellValue('A3', 'Clave CUCOP');
            $sheet->setCellValue('B3', $producto->clave_cucop);
            $sheet->setCellValue('A4', 'Unidad de Medida');
            $sheet->setCellValue('B4', $producto->unidade->unidad_medida);
            $sheet->setCellValue('A5', 'Total Entradas');
            $sheet->setCellValue('B5', $totalEntradas);
            $sheet->setCellValue('A6', 'Total Salidas');
            $sheet->setCellValue('B6', $totalSalidas);
            $sheet->setCellValue('A7', 'Total Disponible');
            $sheet->setCellValue('B7', $totalDisponible);

            $sheet->setCellValue('A9', 'Fecha de Entrada');
            $sheet->setCellValue('B9', 'Cantidad Entrada');
            $rowCount = 10;

            foreach ($producto->entradas as $entrada) {
                $fechaEntrada = Carbon::parse($entrada->fecha_entrada);
                $sheet->setCellValue('A' . $rowCount, $fechaEntrada->toDateString());
                $sheet->setCellValue('B' . $rowCount, $entrada->cantidad_entrada);
                $rowCount++;
            }

            $rowCount++;
            $sheet->setCellValue('A' . $rowCount, 'Fecha de Salida');
            $sheet->setCellValue('B' . $rowCount, 'Cantidad Salida');
            $rowCount++;

            foreach ($producto->salidas as $salida) {
                $fechaSalida = Carbon::parse($salida->fecha_salida);
                $sheet->setCellValue('A' . $rowCount, $fechaSalida->toDateString());
                $sheet->setCellValue('B' . $rowCount, $salida->cantidad_salida);
                $rowCount++;
            }

            $writer = new Xlsx($spreadsheet);
            $filename = 'reporte.xlsx';
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="'. $filename .'"');
            $writer->save('php://output');
            exit;
        }
    }
}

