<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class live_session extends Model
{
    protected $table = 'live_session';
    
    protected $primaryKey = 'id_live_session';

    protected $fillable = [
        'id_live_account',
        'content',
        'periode',
        'is_archive',
        'is_acc',
        'created_at',
    ];

    public $timestamps = false;
}

