<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\form\login;
use App\Http\Controllers\form\register;
use App\Http\Controllers\home\homeController;
use App\Http\Controllers\live\liveController;

use App\Http\Controllers\resetPassword;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

Route::redirect('/', 'form/login', 301);

Route::prefix('form')->group(function () {
    Route::controller(login::class)->group(function () {
        Route::get('/login', 'index');
        Route::post('/login/cekLogin', 'cekLogin');
        //Route::post('/resetPassword', 'resetPassword');
    });
    Route::controller(register::class)->middleware('cekSudahLogin:admin')->group(function () {
        Route::get('/register', 'index')->name('register');
        Route::post('/register/add', 'register');
    });
    // Route::controller(resetPassword::class)->group(function () {
    //     Route::get('/resetPassword', 'index');
    //     Route::post('/', '');
    // });
});


Route::prefix('home')->group(function () {
    Route::controller(homeController::class)->group(function () {
        Route::get('/', 'index');
        Route::post('/kirim', 'sendChat');
        Route::get('/loadMessage', 'loadMessage');
        Route::get('/logout', 'logout');
    });

    Route::controller(adminController::class)->middleware('cekSudahLogin:admin')->group(function () {
        Route::get('/admin', 'index');
        Route::get('/admin/daftarSiswa', 'daftarSiswa');
        Route::get('/admin/liveSetting' , 'liveSetting');
        Route::get('/admin/excel' , 'excel');
        Route::get('/admin/keluhan' , 'keluhan');

        Route::post('/admin/editStatusSiswa', 'editStatusSiswa');
        Route::post('/admin/ImportExcel', 'importExcel');
        Route::post('/orders', 'store');
        Route::post('/admin/daftarSiswa', 'daftarSiswa');
        Route::post('/admin/turnLive', 'turnLive');
    });

});

Route::prefix('live')->group(function () {
    Route::controller(liveController::class)
        ->middleware('cekSudahLogin:siswa,admin,dosen')
        ->group(function () {
            Route::get('/', 'index')->name('live.index');
            Route::post('/store', 'store')->name('live.store');
        });
});

Route::get('/keluhan', function () {
    return view('keluhan.keluhan');
});

Route::get('/keluhan/detailKeluhan', function () {
    return view('keluhan.detailKeluhan');
});
