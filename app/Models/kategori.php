<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class kategori extends Model
{
    protected $connection = "opentalk";
    public $table = 'kategori';
    public $primaryKey = 'id_kategori';
    public $incrementing = true;
    public $timestamps = false;


}
