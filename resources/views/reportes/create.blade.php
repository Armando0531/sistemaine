@extends('tablar::page')

@section('title', 'Crear Reporte de Bodega')

@section('content')
    <!-- Page header -->
    <div class="page-header d-print-none">
        <div class="container-xl">
            <div class="row g-2 align-items-center">
                <div class="col">
                    <!-- Page pre-title -->
                    <div class="page-pretitle">
                        Generar
                    </div>
                    <h2 class="page-title">
                        Reporte de Bodega
                    </h2>
                </div>
                <!-- Page title actions -->
                <div class="col-12 col-md-auto ms-auto d-print-none">
                    <div class="btn-list">
                        <a href="#" class="btn btn-secondary d-none d-sm-inline-block">
                            <!-- Download SVG icon from http://tabler-icons.io/i/arrow-left -->
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24"
                                 viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                                 stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                                <line x1="5" y1="12" x2="19" y2="12"/>
                                <line x1="5" y1="12" x2="11" y2="18"/>
                                <line x1="5" y1="12" x2="11" y2="6"/>
                            </svg>
                            Volver
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page body -->
    <div class="page-body">
        <div class="container-xl">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Detalles del Reporte</h3>
                </div>
                <div class="card-body">
                    <form action="{{ route('reportes.generate') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="clave_cucop" class="form-label">Clave CUCOP</label>
                            <input type="text" id="clave_cucop" name="clave_cucop" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="fecha_inicio" class="form-label">Fecha de Inicio</label>
                            <input type="date" id="fecha_inicio" name="fecha_inicio" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="fecha_fin" class="form-label">Fecha Fin</label>
                            <input type="date" id="fecha_fin" name="fecha_fin" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="formato" class="form-label">Formato del Reporte</label>
                            <select id="formato" name="formato" class="form-control">
                                <option value="pdf">PDF</option>
                                <option value="word">Word</option>
                                <option value="excel">Excel</option>
                            </select>
                        </div>
                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Generar Reporte</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
