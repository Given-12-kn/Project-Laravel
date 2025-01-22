<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class siswa extends Authenticatable
{
    protected $connection = "opentalk";
    public $table = 'siswa';
    public $primaryKey = 'id_siswa';
    public $incrementing = true;
    public $timestamps = false;
    protected $appends = [];
    protected $hidden = ['password_siswa'];

    public $fillable = [
        'id_jurusan',
        'nama',
        'password_siswa',
        'nrp',
        'is_active',
        'angkatan',
        'jenis_kelamin',
    ];
    // public function addUser($username, $name, $nrp, $email, $password) {
    //     $baru = new usersR();
    //     $baru->username = $username;
    //     $baru->nama = $name;
    //     $baru->nrp = $nrp;
    //     $baru->email = $email;
    //     $baru->password = Hash::make($password);
    //     $baru->role = 2;
    //     $baru->save();
    // }

    public function getAuthPassword()
    {
        return $this->password_siswa;
    }

    public function selectAll(){
        return usersR::get();
    }

    public function toLa(){
        return $this->hasOne(live_account::class, 'nrp', 'nrp');
    }

   public function toJurusan(){
        return $this->hasOne(jurusan::class, 'id_jurusan', 'id_jurusan');
   }
}
