<?php

namespace App\Http\Controllers\form;

use App\Http\Controllers\Controller;
use App\Models\siswa;
use App\Models\users;
use App\Models\usersR;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class login extends Controller
{
    public function index()
    {
        return view('form.login');
    }

    public function cekLogin(Request $request){
        $nrp = $request->nrp;
        $password = $request->password;

        $request->validate([
            'nrp' => 'required|max:10|min:9',
            'password' => 'required',
        ],
        [
            'nrp.required' => 'Nrp harus diisi!',
            'nrp.max' => 'Nrp terlalu panjang!',
            'nrp.min' => 'Nrp terlalu pendek!',
        ]);

        $siswa = siswa::where('nrp', $nrp)->first();
        if(!$siswa){
            return redirect(url('form/login'))->with('fail', 'Nrp tidak terdaftar!');
        }
        $pw = Hash::check($password, usersR::where('id', $siswa->id_users)->first()->password);
        if(!$pw){
            return redirect(url('form/login'))->with('fail', 'Password salah!');
        }
        Auth::login($siswa->toUsers);
        return redirect(url('/home'));

        // $data = [
        //     'nrp' => $nrp,
        //     'password' => $password,
        // ];
        // //Auth::attempt($data); itu kalau database nya cuma 1
        // if(Auth::attempt($data)){
        //     return redirect(url('/home'));
        // } else {
        //     return redirect(url('form/login'))->with('fail', 'Email atau Password salah!');
        // }

    }

    public function resetPassword(Request $request){

    }
}
