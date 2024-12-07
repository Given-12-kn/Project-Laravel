<?php

namespace App\Http\Controllers\form;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\users;
use Illuminate\Support\Facades\Auth;

class login extends Controller
{
    public function index()
    {
        return view('form.login');
    }

    public function cekLogin(Request $request){
        $username = $request->username;
        $password = $request->password;

        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ],
        [
            'username.required' => 'Username harus diisi!',
            'password.required' => 'Password harus diisi!',
        ]);

        $data = [
            'username' => $username,
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
