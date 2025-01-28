<?php

use App\Http\Controllers\UserController;
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