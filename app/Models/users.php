<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class users extends Model
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
        $baru->password = bcrypt($password);
        $baru->save();
    }

    public function selectAll(){
        return users::get();
    }

}
