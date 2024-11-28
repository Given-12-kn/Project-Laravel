<?php

use App\Http\Controllers\mainController;
use Illuminate\Support\Facades\Route;

Route::redirect('/','home');

Route::get('home', [mainController::class, 'getHomeContent']);

Route::get('likedsongs', [mainController::class, 'getLikedSongs'])->name('likedsongs');

Route::get('playlist/{id}', [mainController::class, 'getMusic'])->name('playlist');