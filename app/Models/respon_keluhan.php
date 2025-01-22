<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class respon_keluhan extends Model
{
    protected $connection = "opentalk";
    public $table = 'respon_keluhan';
    public $primaryKey = 'id_respon';
    public $incrementing = true;
    public $timestamps = false;

    public $fillable = [
        'id_keluhan',
        'id_dosen',
        'respon',
    ];

   public function toDosen(){
        return $this->hasOne(dosen::class, 'id_dosen', 'id_dosen');
   }
}
