<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class live_account extends Model
{
    protected $connection = "opentalk";
    public $table = 'live_account';
    public $primaryKey = 'id_live_account';
    public $incrementing = true;
    public $timestamps = false;
    protected $appends = ['role_text'];
    protected $hidden = ['password_siswa'];

    public function toSiswa(){
        return $this->hasOne(siswa::class, 'nrp', 'nrp');
    }

    public function toLs(){
        return $this->hasOne(live_session::class, 'id_live_account', 'id_live_account');
    }

}
