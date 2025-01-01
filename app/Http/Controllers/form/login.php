<?php

namespace App\Http\Controllers\form;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class login extends Controller
{
    public function index()
    {
        return view('form.login');
    }

    public function cekLogin(Request $request){
        $email = $request->email;
        $password = $request->password;

        $request->validate([
            'email' => 'required|email|max:255',
            'password' => 'required',
        ],
        [
            'email.required' => 'Email harus diisi!',
            'email.email' => 'Email tidak valid!',
            'email.max' => 'Email terlalu panjang!',
        ]);

        $data = [
            'email' => $email,
            'password' => $password,
        ];

        if(Auth::attempt($data)){
            return redirect(url('/home'));
        } else {
            return redirect(url('form/login'))->with('fail', 'Username atau Password salah!');
        }

    }

    public function resetPassword(Request $request){

    }
}
