<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    protected $connection = "opentalk";
    protected $table = 'siswa';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;

    public $fillable = [
        'id_users',
        'nama',
        'nrp',
    ];

    public function addSiswa($id_users, $nama, $nrp) {
        $baru = new siswa();
        $baru->id_users = $id_users;
        $baru->nama = $nama;
        $baru->nrp = $nrp;
        $baru->save();
    }

    public function selectAll(){
        return siswa::get();
    }

    public function toUsers(){
        return $this->belongsTo(usersR::class, 'id_users', 'id');
    }
}
