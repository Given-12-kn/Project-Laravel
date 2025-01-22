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
        $remembered_nrp = request()->cookie('remember_nrp');
        $remembered_password = request()->cookie('remember_password');

        return view('form.login', [
            'remembered_nrp' => $remembered_nrp,
            'remembered_password' => $remembered_password,
        ]);
    }

    public function cekLogin(Request $request){
        $nrp = $request->nrp;
        $password = $request->password;

        $request->validate([
            'nrp' => 'required|max:10|min:9',
            'password' => 'required|min:3',
        ],
        [
            'nrp.required' => 'Nrp harus diisi!',
            'nrp.max' => 'Nrp terlalu panjang!',
            'nrp.min' => 'Nrp terlalu pendek!',
            'password.required' => 'Password harus diisi!',
            'password.min' => 'Password terlalu pendek!',
        ]);

        $siswa = siswa::where('nrp', $nrp)->first();

        if ($siswa) {
            if ($siswa->is_active == 0) {
                return redirect(url('form/login'))->with('fail', 'Akun Anda Belum Aktif!');
            } else {
                $credentials = [
                    'nrp' => $nrp,
                    'password' => $password,
                ];

                if (Auth::attempt($credentials)) {
                    // Simpan remember me ke cookie
                    if ($request->has('remember')) {
                        $cookie_nrp = cookie('remember_nrp', $nrp, 43200); // 30 hari
                        $cookie_password = cookie('remember_password', $password, 43200);
                        return redirect(url('/home'))->withCookies([$cookie_nrp, $cookie_password]);
                    }

                    $cekAdmin = Auth::user()->toLa->role_account;
                    if ($cekAdmin == 'admin') {
                        return redirect(url('/home/admin'));
                    }
                    return redirect(url('/home'));
                } else {
                    return redirect(url('form/login'))->with('fail', 'Nrp Atau Password Salah!');
                }
            }
        } else {
            return redirect(url('form/login'))->with('fail', 'Nrp Tidak Terdaftar!');
        }
    }

    public function resetPassword(Request $request){

    }
}
