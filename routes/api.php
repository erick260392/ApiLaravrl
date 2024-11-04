<?php

use App\Http\Controllers\studentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/students', [studentController::class , 'index' ]);

Route::post('/students', function (Request $request) {
    return 'Creando Estudiantes';
});

Route::get('/students/{id}', function (Request $request) {
    return 'Obteniendo un Estudiante';
});

Route::put('/students/{id}', function (Request $request) {
    return 'Actualizando Estudiantes';
});


Route::delete('/students/{id}', function (Request $request) {
    return 'Eliminando Estudiantes';
});
