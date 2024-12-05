<?php

use App\Http\Controllers\home\login;
use App\Http\Controllers\home\register;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

Route::redirect('/', 'home', 301);

Route::prefix('home')->group(function () {
    Route::controller(login::class)->group(function () {
        Route::get('/login', 'index');
    });
    Route::controller(register::class)->group(function () {
        Route::get('/register', 'index')->name('register');
        Route::post('/register/add', 'register');
    });
});
