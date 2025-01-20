<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class live_account extends Model
{
    protected $connection = "opentalk";
    public $table = 'live_account';
    public $primaryKey = 'id_live_account';
    public $incrementing = true;
    public $timestamps = true;
    // protected $appends = ['role_text'];
    protected $hidden = ['password_siswa'];

    protected $fillable = [
        'email',
        'nrp',
        'role_account',
        'is_active',
        'created_at',
        'id_live_account',
    ];

    public function toSiswa(){
        return $this->hasOne(siswa::class, 'nrp', 'nrp');
    }

    public function toLs(){
        return $this->hasOne(live_session::class, 'id_live_account', 'id_live_account');
    }

}
