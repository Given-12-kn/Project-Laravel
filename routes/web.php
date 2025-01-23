<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\dosen\dosen;
use App\Http\Controllers\dosen\dosenController;
use App\Http\Controllers\form\login;
use App\Http\Controllers\form\register;
use App\Http\Controllers\home\homeController;
use App\Http\Controllers\keluhan\keluhanController;
use App\Http\Controllers\live\liveController;

use App\Http\Controllers\resetPassword;
use App\Http\Middleware\cekRole;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

Route::redirect('/', 'form/login', 301);

Route::prefix('form')->group(function () {
    Route::controller(login::class)->group(function () {
        Route::get('/login', 'index');
        Route::post('/login/cekLogin', 'cekLogin');
    });
});

//test

Route::prefix('home')->group(function () {
    Route::controller(homeController::class)->group(function () {
        Route::get('/', 'index')->middleware('cekRole:web');
        Route::post('/kirim', 'sendChat')->middleware('cekRole:web');
        Route::get('/loadMessage', 'loadMessage')->middleware('cekRole:web');
        Route::get('/logout', 'logout');
    });

    Route::controller(adminController::class)->middleware('cekRole:web','cekSudahLogin:admin')->group(function () {
        Route::get('/admin', 'index');
        Route::get('/admin/daftarSiswa', 'daftarSiswa');
        Route::get('/admin/liveSetting' , 'liveSetting');
        Route::get('/admin/excel' , 'excel');
        Route::get('/admin/keluhan' , 'keluhan');
        Route::get('/admin/DataSessionAcc', 'accView');
        Route::get('/admin/DataKeluhanAcc', 'accView2');
        Route::get('/admin/listDataAcc', 'accView3');

        Route::post('/admin/editStatusSiswa', 'editStatusSiswa');
        Route::post('/admin/ImportExcel', 'importExcel');
        Route::post('/admin/checkAcc', 'checkAcc');
        Route::post('/admin/daftarSiswa', 'daftarSiswa');
        Route::post('/admin/turnLive', 'turnLive');
        Route::post('/admin/accSession', 'checkAcc');
        Route::post('/admin/accKeluhan', 'checkAcc2');
        Route::post('/admin/countData', 'countData');
        Route::post('/admin/countData2', 'countData2');
        Route::post('/admin/updatenext', 'updateShowing');
        Route::post('/admin/updateprev', 'updateShowingprev');
    });

});

Route::prefix('live')->middleware('cekRole:web','cekSudahLogin:admin,siswa')->group(function () {
    Route::controller(liveController::class)
        ->middleware('cekSudahLogin:siswa,admin,dosen')
        ->group(function () {
            Route::get('/', 'index')->name('live.index');

            Route::post('/store', 'store')->name('live.store');
            Route::post('/getDataChat', 'dataChat')->name('live.store');
        });
});

Route::prefix('keluhan')->group(function () {
    Route::controller(keluhanController::class)->group(function () {
        Route::get('/', 'index');
        // Route::get('/detail', 'detailKeluhan');

        Route::post('/detail/add', 'addKeluhan')->middleware('cekRole:web','cekSudahLogin:admin,siswa');
        Route::post('/detail/keluhanAjax', 'keluhanAjax')->middleware('cekRole:web','cekSudahLogin:admin,siswa');
        Route::post('/detail/upvote', 'upvoteKeluhan')->middleware('cekRole:web','cekSudahLogin:admin,siswa');
        Route::get('/detailKeluhan/{id}', 'detailKeluhan')->middleware('cekRole:dosen');
    });
});

Route::prefix('dosen')->middleware('cekRole:dosen')->group(function () {
    Route::controller(dosenController::class)->group(function () {
        Route::get('/', 'index');
        Route::get('/detail/{id}', 'detailKeluhan');
        Route::get('/live', 'live');
        Route::post('/answer/{id}', 'submitAnswer');
    });
});



