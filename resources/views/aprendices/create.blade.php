<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Aprendiz</title>
</head>
<body>
    <h1>Registrar Aprendiz</h1>

    @if ($errors->any())
        <div>
            <p>Se encontraron los siguientes errores:</p>

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('aprendices.store') }}" method="POST">
        @csrf

        <div>
            <label for="nombre">Nombre completo:</label>
            <input
                type="text"
                id="nombre"
                name="nombre"
                value="{{ old('nombre') }}"
                maxlength="120"
                required
            >
        </div>

        <div>
            <label for="documento">Documento:</label>
            <input
                type="text"
                id="documento"
                name="documento"
                value="{{ old('documento') }}"
                maxlength="40"
                required
            >
        </div>

        <div>
            <label for="correo">Correo:</label>
            <input
                type="email"
                id="correo"
                name="correo"
                value="{{ old('correo') }}"
                maxlength="120"
                required
            >
        </div>

        <div>
            <label for="ficha_id">Ficha (opcional):</label>
            <input
                type="number"
                id="ficha_id"
                name="ficha_id"
                value="{{ old('ficha_id') }}"
            >
        </div>

        <button type="submit">Guardar aprendiz</button>
    </form>

    <p>
        <a href="{{ route('aprendices.index') }}">
            Volver al listado
        </a>
    </p>
</body>
</html>
