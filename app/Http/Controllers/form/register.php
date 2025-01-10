<?php

namespace App\Http\Controllers\form;

use App\Http\Controllers\Controller;
use App\Models\siswa;
use Illuminate\Http\Request;
use App\Models\usersR;
use Illuminate\Support\Facades\DB;

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
            'name' => 'required|min:4|unique:siswa,nama',
            'nrp' => 'required|min:9|unique:siswa,nrp',
            'email' => 'required|email|unique:usersr,email',
            'password' => 'required|min:4',
        ],
        [
            'username.required' => 'Username harus diisi!',
            'name.required' => 'Nama harus diisi!',
            'name.min' => 'Nama minimal 4 karakter!',
            'name.unique' => 'Nama sudah terdaftar!',
            'nrp.required' => 'NRP harus diisi!',
            'nrp.min' => 'NRP minimal 9 karakter!',
            'nrp.unique' => 'NRP sudah terdaftar!',
            'email.required' => 'Email harus diisi!',
            'email.email' => 'Email tidak valid!',
            'email.unique' => 'Email sudah terdaftar!',
            'password.required' => 'Password harus diisi!',
            'password.min' => 'Password minimal 4 karakter!',
        ]);

        DB::beginTransaction();
    try {
        $u = new usersR();
        $u->username = $request->username;
        $u->password = bcrypt($request->password);
        $u->email = $request->email;
        $u->role = 2;
        $u->save();

        siswa::create([
            'id_users' => $u->id,
            'nama' => $request->name,
            'nrp' => $request->nrp,
        ]);

        DB::commit();
        return redirect(route('register'))->with('success', 'Registrasi berhasil!');
    } catch (\Exception $e) {
        DB::rollBack();
        return redirect(route('register'))->with('fail', 'Registrasi gagal! ' . $e->getMessage());
    }
    }
}
