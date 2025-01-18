<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    public function index(){
        return view('home.adminPage');
    }

    public function daftarSiswa(){
        return view('home.daftarSiswa');
    }

    public function addExcel(Request $request){
        dd($request->all());
    }
}
