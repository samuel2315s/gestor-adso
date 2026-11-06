@extends('layouts.app')

@section('title', 'Editar aprendiz')

@section('content')

    <div class="mb-4">
        <h1 class="h2 page-title mb-1">Editar aprendiz</h1>
        <p class="subtitle mb-0">
            Modifique la información del aprendiz seleccionado.
        </p>
    </div>

    <div class="panel">
        @include('aprendices._form', ['aprendiz' => $aprendiz])
    </div>

@endsection