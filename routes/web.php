
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AprendizController;
use App\Models\Aprendiz;

// Redirigir al módulo Aprendices
Route::redirect('/', '/aprendices');

// Proteger las rutas con autenticación y permisos
Route::middleware(['auth'])->group(function () {

    // Ver listado de aprendices
    Route::get('aprendices', [AprendizController::class, 'index'])
        ->middleware('can:viewAny,'.Aprendiz::class)
        ->name('aprendices.index');

    // Formulario para crear aprendices
    Route::get('aprendices/create', [AprendizController::class, 'create'])
        ->middleware('can:create,'.Aprendiz::class)
        ->name('aprendices.create');

    // Guardar un aprendiz
    Route::post('aprendices', [AprendizController::class, 'store'])
        ->middleware('can:create,'.Aprendiz::class)
        ->name('aprendices.store');

    // Ver detalles de un aprendiz
    Route::get('aprendices/{aprendiz}', [AprendizController::class, 'show'])
        ->middleware('can:view,aprendiz')
        ->name('aprendices.show');

    // Formulario para editar aprendices
    Route::get('aprendices/{aprendiz}/edit', [AprendizController::class, 'edit'])
        ->middleware('can:update,aprendiz')
        ->name('aprendices.edit');

    // Actualizar un aprendiz
    Route::put('aprendices/{aprendiz}', [AprendizController::class, 'update'])
        ->middleware('can:update,aprendiz')
        ->name('aprendices.update');

    // Eliminar un aprendiz
    Route::delete('aprendices/{aprendiz}', [AprendizController::class, 'destroy'])
        ->middleware('can:delete,aprendiz')
        ->name('aprendices.destroy');

});

// Rutas de autenticación de Breeze
require __DIR__.'/auth.php';
