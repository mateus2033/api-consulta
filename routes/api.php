<?php

use App\Http\Controllers\{
    CidadesController,
    ConsultasController,
    UserController,
    MedicosController,
    PacientesController
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
        Route::get('/{id_medico}/pacientes', [MedicosController::class, 'listarPacientes'])->name('listar.pacientes')->middleware(['auth:sanctum']);

        Route::prefix('consulta')
            ->name('consulta.')
            ->group(function () {
                Route::get('/{id_paciente}/pacientes', [ConsultasController::class, 'listarConsultas'])->name('listar.consultas')->middleware(['auth:sanctum']);
                Route::post('/', [ConsultasController::class, 'agendarConsulta'])->name('agendar.consulta')->middleware(['auth:sanctum']);
        });
    });

Route::prefix('pacientes')
    ->name('pacientes.')
    ->group(function () {
        Route::post('/', [PacientesController::class, 'adicionarPaciente'])->name('adidionar.paciente')->middleware(['auth:sanctum']);
        Route::put('/{id_paciente}', [PacientesController::class, 'atualizarPaciente'])->name('atualizar.paciente')->middleware(['auth:sanctum']);
});