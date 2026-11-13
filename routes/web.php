<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AprendizController;

// Redirigir al módulo Aprendices
Route::redirect('/', '/aprendices');

// Proteger las rutas de Aprendices
Route::middleware(['auth'])->group(function () {

    Route::resource('aprendices', AprendizController::class)
        ->parameters(['aprendices' => 'aprendiz']);

});

// Rutas de autenticación de Breeze
require __DIR__.'/auth.php';
