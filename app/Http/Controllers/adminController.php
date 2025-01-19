<?php

namespace App\Http\Controllers;

use App\Imports\ImportExcel;
use App\Models\live_account;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class adminController extends Controller
{
    public function index(){
        return view('home.adminPage');
    }

    public function importExcel(Request $request){

        $request->validate([
            'email' => 'email',
            'nrp' => 'integer',
            'role_account' => 'string',
            'is_active' => 'boolean',
        ]);

       //Excel::import(new ImportExcel, $request->file('excel'));
       if($request->file('excel') == null){
           return back()->with('error', 'Data Gagal Diimport');
       }
       else{
           return back()->with('success', 'Data Berhasil Diimport');
       }
    }

    public function excel(){
        return view('home.adminExcel');
    }

    public function keluhan(){
        return view('home.adminExcel');
    }

    public function daftarSiswa(){
        $data = live_account::all();

        return view('home.adminListSiswa', compact('data'));
    }
}
