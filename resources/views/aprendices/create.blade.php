@extends('layouts.app')

@section('title', 'Crear aprendiz')

@section('content')

    <div class="mb-4">
        <h1 class="h2 page-title mb-1">Registrar nuevo aprendiz</h1>
        <p class="subtitle mb-0">
            Complete los siguientes campos para registrar un aprendiz.
        </p>
    </div>

    <div class="panel">
        @include('aprendices._form', ['aprendiz' => $aprendiz])
    </div>

@endsection