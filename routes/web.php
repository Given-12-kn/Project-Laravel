<?php

use App\Http\Controllers\form\login;
use App\Http\Controllers\form\register;
use App\Http\Controllers\home\homeController;
use App\Http\Controllers\resetPassword;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

Route::redirect('/', 'form/login', 301);

Route::prefix('form')->group(function () {
    Route::controller(login::class)->group(function () {
        Route::get('/login', 'index');
        Route::post('/login/cekLogin', 'cekLogin');
        Route::post('/resetPassword', 'resetPassword');
    });
    Route::controller(register::class)->group(function () {
        Route::get('/register', 'index')->name('register');
        Route::post('/register/add', 'register');
    });
    Route::controller(resetPassword::class)->group(function () {
        Route::get('/resetPassword', 'index');
        Route::post('/', '');
    });
});

Route::middleware(['cekSudahLogin'])->group(function () {
    Route::prefix('home')->group(function () {
        Route::controller(homeController::class)->group(function () {
            Route::get('/', 'index');
        });
    });
});

