<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::prefix('users')
    ->name('users.')
    ->group(function () {
        Route::post('/sign-in',[UserController::class, 'signIn'])->name('sign-in');
        Route::post('/sign-up',[UserController::class, 'signUp'])->name('sign-up');
    });
