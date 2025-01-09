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

    public function selectAll(){
        return siswa::get();
    }
}
