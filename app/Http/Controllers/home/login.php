<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\users;
class login extends Controller
{
    public function index()
    {
        return view('home.login');
    }

    public function login(Request $request){
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

        

    }
}
