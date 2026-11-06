<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateAprendizRequest;
use App\Models\Aprendiz;
use Illuminate\Http\Request;

class AprendizController extends Controller
{
    /**
     * Mostrar el listado de aprendices.
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

        return view('aprendices.index', compact('aprendices', 'buscar'));
    }

    /**
     * Mostrar el formulario de registro. (¡ESTE ERA EL QUE FALTABA!)
     */
    public function create()
    {
        // Creamos una instancia vacía para que el formulario _form no falle
        $aprendiz = new Aprendiz(); 
        
        return view('aprendices.create', compact('aprendiz'));
    }

    /**
     * Guardar un nuevo aprendiz.
     */
    public function store(StoreUpdateAprendizRequest $request)
    {
        Aprendiz::create($request->validated());

        return redirect()
            ->route('aprendices.index')
            ->with('ok', 'Aprendiz creado correctamente.');
    }

    /**
     * Mostrar el formulario de edición.
     */
    public function edit(Aprendiz $aprendiz)
    {
        return view('aprendices.edit', compact('aprendiz'));
    }

    /**
     * Actualizar un aprendiz existente.
     */
    public function update(StoreUpdateAprendizRequest $request, Aprendiz $aprendiz)
    {
        $aprendiz->update($request->validated());

        return redirect()
            ->route('aprendices.index')
            ->with('ok', 'Aprendiz actualizado correctamente.');
    }

    /**
     * Eliminar un aprendiz.
     */
    public function destroy(Aprendiz $aprendiz)
    {
        $aprendiz->delete();

        return redirect()
            ->route('aprendices.index')
            ->with('ok', 'Aprendiz eliminado correctamente.');
    }
}