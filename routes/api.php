<?php

use App\Http\Controllers\EspecialidadesController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\MedicosController;
use App\Models\Especialidades;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('hospitais')->group(function (){
    Route::get('/', [HospitalController::class, 'index']);
    Route::post('/', [HospitalController::class, 'store']);
    Route::get('/{hospital}', [HospitalController::class, 'show']);
    Route::put('/{hospital}', [HospitalController::class, 'update']);
    Route::delete('/{hospital}', [HospitalController::class, 'destroy']);
});

Route::prefix('especialidades')->group(function (){
    Route::get('/', [EspecialidadesController::class, 'index']);
    Route::post('/', [EspecialidadesController::class, 'store']);
    Route::get('/{especialidade}', [EspecialidadesController::class, 'show']);
    Route::put('/{especialidade}', [EspecialidadesController::class, 'update']);
    Route::delete('/{especialidade}', [EspecialidadesController::class, 'destroy']);
});

Route::prefix('medicos')->group(function (){
    Route::get('/', [MedicosController::class, 'index']);
    Route::post('/', [MedicosController::class, 'store']);
    Route::get('/{medico}', [MedicosController::class, 'show']);
});
