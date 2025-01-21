<?php

namespace App\Http\Controllers\keluhan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class keluhanController extends Controller
{
    public function index(){
        $kategori = DB::table('kategori')->get(); 
        return view('keluhan.keluhan', compact('kategori'));
    }
}
