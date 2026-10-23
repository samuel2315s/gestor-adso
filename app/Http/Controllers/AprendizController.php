<?php

namespace App\Http\Controllers;

use App\Models\Aprendiz;
use Illuminate\Http\Request;

class AprendizController extends Controller
{
    /**
     * Mostrar aprendices, con búsqueda y paginación.
     */
    public function index(Request $request)
    {
        $buscar = $request->input('buscar');

        $aprendices = Aprendiz::query()
            ->when($buscar, function ($query, $buscar) {
                $query->where(function ($consulta) use ($buscar) {
                    $consulta->where('nombre', 'like', "%{$buscar}%")
                        ->orWhere('documento', 'like', "%{$buscar}%")
                        ->orWhere('correo', 'like', "%{$buscar}%");
                });
            })
            ->orderBy('id', 'desc')
            ->paginate(10)
            ->withQueryString();

        return view('aprendices.index', compact(
            'aprendices',
            'buscar'
        ));
    }

    /**
     * Mostrar el formulario de registro.
     */
    public function create()
    {
        return view('aprendices.create');
    }

    /**
     * Guardar un nuevo aprendiz.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre' => [
                'required',
                'string',
                'max:120'
            ],

            'documento' => [
                'required',
                'string',
                'max:40',
                'unique:aprendices,documento'
            ],

            'correo' => [
                'required',
                'email',
                'max:120',
                'unique:aprendices,correo'
            ],

            'ficha_id' => [
                'nullable',
                'integer'
            ],
        ]);

        Aprendiz::create($data);

        return redirect()
            ->route('aprendices.index')
            ->with('ok', 'Aprendiz creado correctamente.');
    }

    /**
     * Métodos que todavía no se implementan.
     */
    public function show(Aprendiz $aprendiz)
    {
        abort(404);
    }

    public function edit(Aprendiz $aprendiz)
    {
        abort(404);
    }

    public function update(Request $request, Aprendiz $aprendiz)
    {
        abort(404);
    }

    public function destroy(Aprendiz $aprendiz)
    {
        abort(404);
    }
}
