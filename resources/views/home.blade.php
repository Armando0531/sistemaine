@extends('tablar::page')

@section('content')
    <!-- Page header -->

    <!-- Agregar sección para mensajes de error -->
    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <!-- Aquí el resto de tu contenido de página -->
@endsection
