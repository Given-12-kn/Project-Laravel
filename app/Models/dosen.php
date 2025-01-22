<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class dosen extends Authenticatable
{
    protected $connection = "opentalk";
    public $table = 'dosen';
    public $primaryKey = 'id_dosen';
    public $incrementing = true;
    public $timestamps = false;

    public $fillable = [
        'nama',
        'password_dosen',
        'nrp',
        'jenis_kelamin',
        'is_active',
    ];

   public function toResponKeluhan(){
        return $this->hasMany(respon_keluhan::class, 'id_dosen', 'id_dosen');
   }

   public function getAuthPassword(){
        return $this->password_dosen;
   }
}
