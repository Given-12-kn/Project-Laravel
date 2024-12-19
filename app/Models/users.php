<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\User as Authenticatable;

class users extends Authenticatable
{
    
    public $table = 'users';
    public $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;
    public $fillable = [
        'username',
        'nama',
        'nrp',
        'email',
        'password',
    ];
    public function addUser($username, $name, $nrp, $email, $password) {
        $baru = new users();
        $baru->username = $username;
        $baru->nama = $name;
        $baru->nrp = $nrp;
        $baru->email = $email;
        $baru->password = Hash::make($password);
        $baru->save();
    }

    public function selectAll(){
        return users::get();
    }

}
