<?php

namespace App\Http\Controllers\keluhan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class keluhanController extends Controller
{
    public function index(){
        return view('keluhan.keluhan');
    }
}
