<form
    action="{{ $aprendiz->exists
        ? route('aprendices.update', $aprendiz)
        : route('aprendices.store') }}"
    method="POST"
    novalidate
>

    @csrf

    @if ($aprendiz->exists)
        @method('PUT')
    @endif

    <div class="row g-4">

        {{-- Nombre --}}
        <div class="col-12 col-md-6">
            <label for="nombre" class="form-label">Nombre completo</label>

            <input
                type="text"
                id="nombre"
                name="nombre"
                class="form-control @error('nombre') is-invalid @enderror"
                value="{{ old('nombre', $aprendiz->nombre ?? '') }}"
                placeholder="Ingrese el nombre"
            >

            @error('nombre')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Documento --}}
        <div class="col-12 col-md-6">
            <label for="documento" class="form-label">Documento</label>

            <input
                type="text"
                id="documento"
                name="documento"
                class="form-control @error('documento') is-invalid @enderror"
                value="{{ old('documento', $aprendiz->documento ?? '') }}"
                placeholder="Ingrese el documento"
            >

            @error('documento')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Correo --}}
        <div class="col-12 col-md-6">
            <label for="correo" class="form-label">Correo electrónico</label>

            <input
                type="email"
                id="correo"
                name="correo"
                class="form-control @error('correo') is-invalid @enderror"
                value="{{ old('correo', $aprendiz->correo ?? '') }}"
                placeholder="Ingrese el correo"
            >

            @error('correo')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        {{-- Ficha --}}
        <div class="col-12 col-md-6">
            <label for="ficha_id" class="form-label">Ficha</label>

            <input
                type="number"
                id="ficha_id"
                name="ficha_id"
                class="form-control @error('ficha_id') is-invalid @enderror"
                value="{{ old('ficha_id', $aprendiz->ficha_id ?? '') }}"
                placeholder="Número de ficha"
            >

            @error('ficha_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

    </div>

    <div class="d-flex flex-wrap gap-2 mt-4">

        <button type="submit" class="btn btn-primary btn-custom">
            {{ $aprendiz->exists ? '💾 Actualizar aprendiz' : '💾 Guardar aprendiz' }}
        </button>

        <a href="{{ route('aprendices.index') }}" class="btn btn-outline-secondary btn-custom d-flex align-items-center">
            Cancelar
        </a>

    </div>

</form>