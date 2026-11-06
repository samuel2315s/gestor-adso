@extends('layouts.app')

@section('title', 'Aprendices')

@section('content')

    {{-- ENCABEZADO --}}
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-4">
        <div>
            <h1 class="h2 page-title mb-1">Gestión de aprendices</h1>
            <p class="subtitle mb-0">Consulta y administra los aprendices registrados.</p>
        </div>

        <a href="{{ route('aprendices.create') }}" class="btn btn-primary btn-custom">
             Nuevo aprendiz
        </a>
    </div>

    <div class="panel">

        {{-- TÍTULO DEL LISTADO --}}
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2 class="h5 fw-bold mb-0">Listado de aprendices</h2>
            <span class="badge text-bg-primary">
                {{ $aprendices->total() }} registros
            </span>
        </div>

        {{-- BUSCADOR --}}
        <form action="{{ route('aprendices.index') }}" method="GET" class="row g-2 mb-4">

            <div class="col-12 col-md-8 col-lg-9">
                <input
                    type="search"
                    name="buscar"
                    class="form-control search-input"
                    placeholder="Buscar por nombre, documento o correo..."
                    value="{{ $buscar }}"
                    aria-label="Buscar aprendices"
                >
            </div>

            <div class="col-6 col-md-2">
                <button type="submit" class="btn btn-primary btn-custom w-100">
                    Buscar
                </button>
            </div>

            <div class="col-6 col-md-2">
                <a
                    href="{{ route('aprendices.index') }}"
                    class="btn btn-outline-secondary btn-custom w-100 d-flex align-items-center justify-content-center"
                >
                    Limpiar
                </a>
            </div>

        </form>

        {{-- TABLA --}}
        <div class="table-responsive">
            <table class="table align-middle">

                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Aprendiz</th>
                        <th>Documento</th>
                        <th>Correo electrónico</th>
                        <th>Ficha</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse ($aprendices as $aprendiz)

                        <tr>
                            <td class="text-secondary">#{{ $aprendiz->id }}</td>

                            <td>
                                <div class="d-flex align-items-center">
                                    <span class="avatar">
                                        {{ strtoupper(substr($aprendiz->nombre, 0, 1)) }}
                                    </span>
                                    <span class="fw-semibold">{{ $aprendiz->nombre }}</span>
                                </div>
                            </td>

                            <td>
                                <span class="document-badge">{{ $aprendiz->documento }}</span>
                            </td>

                            <td>{{ $aprendiz->correo }}</td>

                            <td>
                                @if ($aprendiz->ficha_id)
                                    <span class="badge text-bg-light">{{ $aprendiz->ficha_id }}</span>
                                @else
                                    <span class="text-secondary">Sin asignar</span>
                                @endif
                            </td>

                            <td>
                                <div class="d-flex justify-content-center gap-2">

                                    {{-- Botón Editar --}}
                                    <a
                                        href="{{ route('aprendices.edit', $aprendiz) }}"
                                        class="btn btn-warning btn-sm"
                                    >
                                         Editar
                                    </a>

                                    {{-- Botón Eliminar --}}
                                    <form
                                        action="{{ route('aprendices.destroy', $aprendiz) }}"
                                        method="POST"
                                        onsubmit="return confirm('¿Estás seguro de eliminar este aprendiz?')"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger btn-sm">
                                             Eliminar
                                        </button>
                                    </form>

                                </div>
                            </td>
                        </tr>

                    @empty

                        <tr>
                            <td colspan="6" class="text-center py-5">
                                <div class="fs-2 mb-2"></div>
                                <h3 class="h6 fw-bold">No se encontraron aprendices</h3>
                                <p class="text-secondary mb-0">
                                    Prueba con otro nombre, documento o correo electrónico.
                                </p>
                            </td>
                        </tr>

                    @endforelse

                </tbody>
            </table>
        </div>

        {{-- PAGINACIÓN --}}
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mt-4">

            <div class="small text-secondary">
                @if ($aprendices->total() > 0)
                    Mostrando {{ $aprendices->firstItem() }}–{{ $aprendices->lastItem() }}
                    de {{ $aprendices->total() }} registros.
                @endif
            </div>

            <div>
                {{ $aprendices->links('pagination::bootstrap-5') }}
            </div>

        </div>

    </div>

@endsection