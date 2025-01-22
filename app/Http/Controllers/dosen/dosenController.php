<?php

namespace App\Http\Controllers\dosen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class dosenController extends Controller
{
    public function index()
    {
        return view('dosen.dosenKeluhan');
    }

    public function detail()
    {
        return view('dosen.dosenDetailKeluhan');
    }

    public function live(){
        return view('dosen.dosenLive');
    }
}
