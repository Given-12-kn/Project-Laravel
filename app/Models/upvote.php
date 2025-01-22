<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class upvote extends Model
{
    protected $connection = "opentalk";
    public $table = 'upvote';
    public $primaryKey = 'id_upvote';
    public $incrementing = true;
    public $timestamps = true;

    public function toKeluhan(){
        return $this->belongsTo(keluhan::class, 'id_keluhan', 'id_keluhan');
    }   
}
