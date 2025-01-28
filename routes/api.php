<?php

use App\Http\Controllers\{
    CidadesController,
    UserController
};
use Illuminate\Support\Facades\Route;

Route::group([], function () {
    Route::post('/login',[UserController::class, 'signIn'])->name('sign-in');
    Route::post('/cadastrar',[UserController::class, 'signUp'])->name('sign-up');
});

Route::middleware(['auth:sanctum'])
    ->group(function () {
        Route::prefix('user')
            ->name('user.')
            ->group(function () {
                Route::get('/', [UserController::class, 'me'])->name('me');
            });

});

Route::group([], function () {
        Route::prefix('cidades')
            ->name('cidades.')
            ->group(function () {
                Route::get('/', [CidadesController::class, 'listarCidades'])->name('cidades');
            });

});