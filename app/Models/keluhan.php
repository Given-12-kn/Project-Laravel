<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class keluhan extends Model
{
    use SoftDeletes;
    protected $connection = "opentalk";
    public $table = 'keluhan';
    public $primaryKey = 'id_keluhan';
    public $incrementing = true;
    public $timestamps = true;

    public function toSiswa(){
        return $this->hasOne(siswa::class, 'id_siswa', 'id_siswa');
    }

    public function toKategori(){
        return $this->hasOne(kategori::class, 'id_kategori', 'id_kategori');
    }
}
