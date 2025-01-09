<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class dosen extends Model
{
    protected $connection = "opentalk";
    protected $table = 'dosen';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;

    public $fillable = [
        'id_users',
        'nama',
        'nip',
    ];

    public function selectAll(){
        return dosen::get();
    }
}
