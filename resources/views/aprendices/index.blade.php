
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Gestor ADSO | Aprendices</title>

    <!-- Bootstrap 5 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #f4f7fb;
            color: #243247;
            font-family: Arial, sans-serif;
        }

        .sidebar {
            background: #172554;
            color: white;
            min-height: 100vh;
            padding: 28px 18px;
        }

        .brand {
            font-size: 23px;
            font-weight: bold;
            margin-bottom: 38px;
        }

        .menu-link {
            display: block;
            color: #dbeafe;
            text-decoration: none;
            padding: 13px 15px;
            border-radius: 10px;
            margin-bottom: 8px;
            transition: background 0.2s;
        }

        .menu-link.active,
        .menu-link:hover {
            background: #2563eb;
            color: white;
        }

        .main-content {
            padding: 35px;
        }

        .page-title {
            font-weight: 700;
            color: #172554;
        }

        .subtitle {
            color: #64748b;
        }

        .panel {
            background: white;
            border-radius: 16px;
            padding: 24px;
            box-shadow: 0 5px 24px rgba(15, 23, 42, 0.06);
        }

        .search-input {
            min-height: 46px;
            border-radius: 10px;
        }

        .btn-custom {
            min-height: 44px;
            border-radius: 10px;
            font-weight: 600;
        }

        .table {
            margin-bottom: 0;
        }

        .table thead th {
            background: #eff6ff;
            color: #334155;
            font-size: 13px;
            text-transform: uppercase;
            padding: 16px;
            white-space: nowrap;
        }

        .table tbody td {
            padding: 16px;
            vertical-align: middle;
        }

        .table tbody tr:hover {
            background: #f8fafc;
        }

        .avatar {
            width: 38px;
            height: 38px;
            flex-shrink: 0;
            border-radius: 50%;
            background: #dbeafe;
            color: #1d4ed8;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            margin-right: 10px;
        }

        .document-badge {
            display: inline-block;
            background: #f1f5f9;
            color: #475569;
            padding: 6px 10px;
            border-radius: 7px;
            font-size: 13px;
        }

        .pagination {
            margin-bottom: 0;
            gap: 4px;
            flex-wrap: wrap;
        }

        .page-link {
            border-radius: 8px !important;
            border: none;
            color: #1d4ed8;
            padding: 9px 13px;
        }

        .page-item.active .page-link {
            background: #2563eb;
            color: white;
        }

        .page-item.disabled .page-link {
            color: #94a3b8;
        }

        footer {
            color: #64748b;
        }

        @media (max-width: 767px) {
            .sidebar {
                min-height: auto;
                padding: 18px;
            }

            .brand {
                margin-bottom: 15px;
            }

            .main-content {
                padding: 20px 12px;
            }

            .panel {
                padding: 15px;
            }
        }
    </style>
</head>

<body>

<div class="container-fluid">
    <div class="row">

        <!-- MENÚ LATERAL -->
        <aside class="col-md-3 col-lg-2 sidebar">

            <div class="brand">
                Gestor ADSO
            </div>

            <a
                href="{{ route('aprendices.index') }}"
                class="menu-link active"
            >
                👥 Aprendices
            </a>

            <a
                href="{{ route('aprendices.create') }}"
                class="menu-link"
            >
                ➕ Registrar aprendiz
            </a>

        </aside>

        <!-- CONTENIDO PRINCIPAL -->
        <main class="col-md-9 col-lg-10 main-content">

            <!-- ENCABEZADO -->
            <div class="d-flex flex-wrap justify-content-between
                        align-items-center gap-3 mb-4">

                <div>
                    <h1 class="page-title h2">
                        Gestión de aprendices
                    </h1>

                    <p class="subtitle mb-0">
                        Consulta y administra los aprendices registrados.
                    </p>
                </div>

                <a
                    href="{{ route('aprendices.create') }}"
                    class="btn btn-primary btn-custom px-4"
                >
                    + Nuevo aprendiz
                </a>

            </div>

            <!-- MENSAJE DE ÉXITO -->
            @if (session('ok'))
                <div
                    class="alert alert-success alert-dismissible fade show"
                    role="alert"
                >
                    {{ session('ok') }}

                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="alert"
                        aria-label="Cerrar"
                    ></button>
                </div>
            @endif

            <!-- TARJETA DEL LISTADO -->
            <section class="panel">

                <div class="d-flex flex-wrap justify-content-between
                            align-items-center gap-2 mb-4">

                    <div>
                        <h2 class="h5 fw-bold mb-1">
                            Listado de aprendices
                        </h2>

                        <p class="text-secondary small mb-0">
                            Consulta los registros de la base de datos.
                        </p>
                    </div>

                    <span
                        class="badge text-bg-primary rounded-pill px-3 py-2"
                    >
                        {{ $aprendices->total() }} registros
                    </span>

                </div>

                <!-- BARRA BUSCADORA -->
                <form
                    action="{{ route('aprendices.index') }}"
                    method="GET"
                    class="row g-2 mb-4"
                >

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

                        <button
                            type="submit"
                            class="btn btn-primary btn-custom w-100"
                        >
                            Buscar
                        </button>

                    </div>

                    <div class="col-6 col-md-2">

                        <a
                            href="{{ route('aprendices.index') }}"
                            class="btn btn-outline-secondary btn-custom w-100
                                   d-flex align-items-center
                                   justify-content-center"
                        >
                            Limpiar
                        </a>

                    </div>

                </form>

                <!-- TABLA DE APRENDICES -->
                <div class="table-responsive">

                    <table class="table align-middle">

                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Aprendiz</th>
                                <th>Documento</th>
                                <th>Correo electrónico</th>
                                <th>Ficha</th>
                            </tr>
                        </thead>

                        <tbody>

                            @forelse ($aprendices as $aprendiz)

                                <tr>

                                    <td class="text-secondary">
                                        #{{ $aprendiz->id }}
                                    </td>

                                    <td>
                                        <div class="d-flex align-items-center">

                                            <span class="avatar">
                                                {{ strtoupper(substr($aprendiz->nombre, 0, 1)) }}
                                            </span>

                                            <span class="fw-semibold">
                                                {{ $aprendiz->nombre }}
                                            </span>

                                        </div>
                                    </td>

                                    <td>
                                        <span class="document-badge">
                                            {{ $aprendiz->documento }}
                                        </span>
                                    </td>

                                    <td>
                                        {{ $aprendiz->correo }}
                                    </td>

                                    <td>

                                        @if ($aprendiz->ficha_id)

                                            <span class="badge text-bg-light">
                                                {{ $aprendiz->ficha_id }}
                                            </span>

                                        @else

                                            <span class="text-secondary">
                                                Sin asignar
                                            </span>

                                        @endif

                                    </td>

                                </tr>

                            @empty

                                <tr>
                                    <td colspan="5" class="text-center py-5">

                                        <div class="fs-2 mb-2">
                                            🔎
                                        </div>

                                        <h3 class="h6 fw-bold">
                                            No se encontraron aprendices
                                        </h3>

                                        <p class="text-secondary mb-0">
                                            Prueba con otro nombre,
                                            documento o correo electrónico.
                                        </p>

                                    </td>
                                </tr>

                            @endforelse

                        </tbody>

                    </table>

                </div>

                <!-- INFORMACIÓN Y PAGINACIÓN -->
                <div class="d-flex flex-column flex-lg-row
                            justify-content-between align-items-center
                            gap-3 mt-4">

                    <p class="text-secondary small mb-0">

                        @if ($aprendices->total() > 0)

                            Mostrando
                            {{ $aprendices->firstItem() }}–{{ $aprendices->lastItem() }}
                            de {{ $aprendices->total() }} registros.

                        @else

                            No hay registros para mostrar.

                        @endif

                    </p>

                    <div>
                        {{ $aprendices->links('pagination::bootstrap-5') }}
                    </div>

                </div>

            </section>

            <!-- PIE DE PÁGINA -->
            <footer class="text-center small mt-4">
                Gestor ADSO · Sistema de gestión de aprendices
            </footer>

        </main>

    </div>
</div>

<!-- JavaScript de Bootstrap -->
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
></script>

</body>
</html>
