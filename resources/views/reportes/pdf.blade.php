<!DOCTYPE html>
<html>
<head>
    <title>Reporte de Producto</title>
    <style>
        body { font-family: DejaVu Sans; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; }
    </style>
</head>
<body>
    <h1>Reporte de Producto</h1>
    <p><strong>Nombre:</strong> {{ $producto->nombre_articulo }}</p>
    <p><strong>Descripción:</strong> {{ $producto->descripcion }}</p>
    <p><strong>Clave CUCOP:</strong> {{ $producto->clave_cucop }}</p>
    <p><strong>Unidad de Medida:</strong> {{ $producto->unidade->unidad_medida }}</p>
    <h2>Entradas</h2>
    <table>
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Cantidad</th>
            </tr>
        </thead>
        <tbody>
            @foreach($producto->entradas as $entrada)
            <tr>
                <td>{{ $entrada->fecha_entrada }}</td>
                <td>{{ $entrada->cantidad_entrada }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <h2>Salidas</h2>
    <table>
        <thead>
            <tr>
                <th>Fecha</th>
                <th>Cantidad</th>
            </tr>
        </thead>
        <tbody>
            @foreach($producto->salidas as $salida)
            <tr>
                <td>{{ $salida->fecha_salida }}</td>
                <td>{{ $salida->cantidad_salida }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <h2>Total Disponible</h2>
    <p>{{ $totalDisponible }}</p>
</body>
</html>
