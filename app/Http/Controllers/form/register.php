<?php

namespace App\Http\Controllers\form;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\usersR;

class register extends Controller
{
    public function index()
    {
        return view('form.register');
    }

    public function register(Request $request)
    {
        $usename = $request->username;
        $name = $request->name;
        $nrp = $request->nrp;
        $email = $request->email;
        $password = $request->password;

        $request->validate([
            'username' => 'required',
            'name' => 'required',
            'nrp' => 'required|min:9',
            'email' => 'required|email',
            'password' => 'required|min:4',
        ],
        [
            'username.required' => 'Username harus diisi!',
            'name.required' => 'Nama harus diisi!',
            'nrp.required' => 'NRP harus diisi!',
            'nrp.min' => 'NRP minimal 9 karakter!',
            'email.required' => 'Email harus diisi!',
            'email.email' => 'Email tidak valid!',
            'password.required' => 'Password harus diisi!',
            'password.min' => 'Password minimal 4 karakter!',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ];

        $u = new usersR();
        $u->addUser($usename, $name, $nrp, $email, $password);
        return redirect(route('register'));
    }
}
