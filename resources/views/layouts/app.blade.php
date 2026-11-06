<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Gestor ADSO')</title>

    <!-- Bootstrap 5 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            background: #f4f7fb;
            color: #243247;
            font-family: Arial, sans-serif;
        }

        /* ---------- Menú lateral ---------- */
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

        /* ---------- Contenido ---------- */
        .main-content { padding: 35px; }

        .page-title {
            font-weight: 700;
            color: #172554;
        }

        .subtitle { color: #64748b; }

        .panel {
            background: white;
            border-radius: 16px;
            padding: 28px;
            box-shadow: 0 5px 24px rgba(15, 23, 42, 0.06);
        }

        /* ---------- Formulario ---------- */
        .form-label {
            font-weight: 600;
            color: #334155;
        }

        .form-control {
            min-height: 46px;
            border-radius: 10px;
            border: 1px solid #cbd5e1;
        }

        .form-control:focus {
            border-color: #2563eb;
            box-shadow: 0 0 0 0.2rem rgba(37, 99, 235, 0.15);
        }

        .btn-custom {
            min-height: 44px;
            border-radius: 10px;
            font-weight: 600;
            padding-left: 22px;
            padding-right: 22px;
        }

        .btn-primary {
            background: #2563eb;
            border-color: #2563eb;
        }

        .btn-primary:hover {
            background: #1d4ed8;
            border-color: #1d4ed8;
        }

        .alert-ok {
            background: #dcfce7;
            color: #166534;
            border: none;
            border-radius: 12px;
        }


        /* ---------- Buscador ---------- */
        .search-input {
            min-height: 46px;
            border-radius: 10px;
        }

        /* ---------- Tabla ---------- */
        .table { margin-bottom: 0; }

        .table thead th {
            background: #eff6ff;
            color: #334155;
            font-size: 13px;
            text-transform: uppercase;
            padding: 16px;
            white-space: nowrap;
            border-bottom: none;
        }

        .table tbody td {
            padding: 16px;
            vertical-align: middle;
        }

        .table tbody tr:hover { background: #f8fafc; }

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

        /* ---------- Paginación ---------- */
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

        .page-item.disabled .page-link { color: #94a3b8; }

        footer { color: #64748b; }

        @media (max-width: 767px) {
            .sidebar { min-height: auto; padding: 18px; }
            .brand { margin-bottom: 15px; }
            .main-content { padding: 20px 12px; }
            .panel { padding: 18px; }
        }
    </style>
</head>

<body>

<div class="container-fluid">
    <div class="row">

        <!-- MENÚ LATERAL -->
        <aside class="col-md-3 col-lg-2 sidebar">

            <div class="brand">Gestor ADSO</div>

            <a
                href="{{ route('aprendices.index') }}"
                class="menu-link {{ request()->routeIs('aprendices.index') ? 'active' : '' }}"
            >
                 Aprendices
            </a>

            <a
                href="{{ route('aprendices.create') }}"
                class="menu-link {{ request()->routeIs('aprendices.create') ? 'active' : '' }}"
            >
                 Nuevo aprendiz
            </a>

        </aside>

        <!-- CONTENIDO PRINCIPAL -->
        <main class="col-md-9 col-lg-10 main-content">

            @if (session('ok'))
                <div class="alert alert-ok alert-dismissible fade show" role="alert">
                    ✅ {{ session('ok') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Cerrar"></button>
                </div>
            @endif

            @yield('content')

            <footer class="text-center small mt-4">
                Gestor ADSO · Sistema de gestión de aprendices
            </footer>

        </main>

    </div>
</div>

<!-- JavaScript de Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>