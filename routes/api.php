<?php

use App\Http\Controllers\{
    CidadesController,
    UserController,
    MedicosController
};
use Illuminate\Support\Facades\Route;

Route::group([], function () {
    Route::post('/login',[UserController::class, 'signIn'])->name('sign-in');
    Route::post('/cadastrar',[UserController::class, 'signUp'])->name('sign-up');
});

Route::prefix('user')
    ->name('user.')
    ->group(function () {
        Route::get('/', [UserController::class, 'me'])->name('me')->middleware(['auth:sanctum']);
    });

Route::prefix('cidades')
    ->name('cidades.')
    ->group(function () {
        Route::get('/', [CidadesController::class, 'listarCidades'])->name('listar.cidades');
        Route::get('/{id_cidade}/medicos', [CidadesController::class, 'listarMedicos'])->name('listar.medicos.cidades');
    });

Route::prefix('medicos')
    ->name('medicos.')
    ->group(function () {
        Route::get('/', [MedicosController::class, 'listarMedicos'])->name('listar.medicos');
        Route::post('/', [MedicosController::class, 'adicioarMedico'])->name('adicioar.medico')->middleware(['auth:sanctum']);
    });