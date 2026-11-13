
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Gestor ADSO')</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <nav class="navbar navbar-expand-lg bg-white border-bottom">
        <div class="container">

            <a class="navbar-brand fw-bold" href="{{ url('/') }}">
                Gestor ADSO
            </a>

            <div class="d-flex align-items-center gap-3">

                <a href="{{ route('aprendices.index') }}"
                   class="text-decoration-none">
                    Aprendices
                </a>

                @auth

                    <span>
                        Hola, {{ auth()->user()->name }}
                    </span>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <button type="submit" class="btn btn-danger btn-sm">
                            Salir
                        </button>
                    </form>

                @endauth

                @guest

                    <a href="{{ route('login') }}"
                       class="btn btn-outline-primary btn-sm">
                        Iniciar sesión
                    </a>

                    <a href="{{ route('register') }}"
                       class="btn btn-primary btn-sm">
                        Registrarse
                    </a>

                @endguest

            </div>
        </div>
    </nav>

    <main class="container py-4">

        @if(session('ok'))
            <div class="alert alert-success">
                {{ session('ok') }}
            </div>
        @endif

        @yield('content')

        @isset($slot)
            {{ $slot }}
        @endisset

    </main>

</body>
</html>
