<?php

use App\Http\Controllers\home\login;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

Route::redirect('/', 'home', 301);

Route::prefix('home')->group(function () {
    Route::controller(login::class)->group(function () {
        Route::get('/login', 'index');
        Route::post('/register', 'store');
    });
});
