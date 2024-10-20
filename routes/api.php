<?php

use App\Http\Controllers\EspecialidadesController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\MedicosController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('hospitais')->group(function (){
    Route::get('/', [HospitalController::class, 'index']);
    Route::get('/{hospital}', [HospitalController::class, 'show']);
});

Route::prefix('especialidades')->group(function (){
    Route::get('/', [EspecialidadesController::class, 'index']);
    Route::get('/{especialidade}', [EspecialidadesController::class, 'show']);
});

Route::prefix('medicos')->group(function (){
    Route::get('/', [MedicosController::class, 'index']);
    Route::get('/{medico}', [MedicosController::class, 'show']);
});
