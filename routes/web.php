<?php

use App\Http\Controllers\mainController;
use Illuminate\Support\Facades\Route;

Route::redirect('/','home');

Route::get('home', [mainController::class, 'getSidebar']);