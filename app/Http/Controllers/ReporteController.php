<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use Barryvdh\DomPDF\Facade\Pdf;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory as WordIOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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
                        ->firstOrFail();

        $totalEntradas = $producto->entradas->sum('cantidad_entrada');
        $totalSalidas = $producto->salidas->sum('cantidad_salida');
        $totalDisponible = $producto->cantidad - $totalSalidas + $totalEntradas;

        if ($request->formato == 'pdf') {
            $pdf = PDF::loadView('reportes.pdf', compact('producto', 'totalEntradas', 'totalSalidas', 'totalDisponible'));
            return $pdf->download('reporte.pdf');
        } elseif ($request->formato == 'word') {
            $phpWord = new PhpWord();
            $section = $phpWord->addSection();
            $section->addText("Reporte de Producto");
            $section->addText("Nombre: {$producto->nombre_articulo}");
            $section->addText("Descripción: {$producto->descripcion}");
            $section->addText("Clave CUCOP: {$producto->clave_cucop}");
            $section->addText("Unidad de Medida: {$producto->unidade->unidad_medida}");
            $section->addText("Total Entradas: {$totalEntradas}");
            $section->addText("Total Salidas: {$totalSalidas}");
            $section->addText("Total Disponible: {$totalDisponible}");
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
            $writer = new Xlsx($spreadsheet);
            $filename = 'reporte.xlsx';
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="'. $filename .'"');
            $writer->save('php://output');
            exit;
        }
    }
}

