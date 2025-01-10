<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;

class usersR extends Authenticatable
{
    protected $connection = "opentalk";
    public $table = 'usersR';
    public $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;
    protected $appends = ['role_text'];
    public $fillable = [
        'username',
        'nama',
        'nrp',
        'email',
        'password',
    ];
    public function addUser($username, $name, $nrp, $email, $password) {
        $baru = new usersR();
        $baru->username = $username;
        $baru->nama = $name;
        $baru->nrp = $nrp;
        $baru->email = $email;
        $baru->password = Hash::make($password);
        $baru->role = 2;
        $baru->save();
    }

    public function getRoleTextAttribute() {
        $role = $this->role;
        if ($role == 0) {
            return 'admin';
        } else if ($role == 1) {
            return 'dosen';
        } else if ($role == 2) {
            return 'siswa';
        }
    }

    public function selectAll(){
        return usersR::get();
    }

}
