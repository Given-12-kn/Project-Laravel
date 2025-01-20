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
            'password' => 'required|min:3',
        ],
        [
            'nrp.required' => 'Nrp harus diisi!',
            'nrp.max' => 'Nrp terlalu panjang!',
            'nrp.min' => 'Nrp terlalu pendek!',
            'password.required' => 'Password harus diisi!',
            'password.min' => 'Password terlalu pendek!',
        ]);

        // $siswa = siswa::where('nrp', $nrp)->first();
        // if(!$siswa){
        //     return redirect(url('form/login'))->with('fail', 'Nrp tidak terdaftar!');
        // }
        // $pw = Hash::check($password, usersR::where('id', $siswa->id_users)->first()->password);
        // if(!$pw){
        //     return redirect(url('form/login'))->with('fail', 'Password salah!');
        // }
        // Auth::login($siswa->toUsers);
        // return redirect(url('/home'));
        $siswa = siswa::where('nrp', $nrp)->first();
        if($siswa){
            if($siswa->is_active == 0){
                return redirect(url('form/login'))->with('fail', 'Akun Anda Belum Aktif!');
            }
            else{
                $data = [
                    'nrp' => $nrp,
                    'password' => $password,
                ];
                
                if(Auth::attempt($data)){
                    $cekAdmin = Auth::user()->toLa->role_account;
                    if($cekAdmin == 'admin'){
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
