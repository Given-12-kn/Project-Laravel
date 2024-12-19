<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class chat extends Model
{
    protected $connection = "mysql";
    protected $table = 'users';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'nrp_mahasiswa',
        'chat',
        'periode',
        'created_at',
    ];

    public function addChat($nrp_mahasiswa, $chat, $periode, $created_at) {
        $baru = new chat();
        $baru->nrp_mahasiswa = $nrp_mahasiswa;
        $baru->chat = $chat;
        $baru->periode = $periode;
        $baru->created_at = $created_at;
        $baru->save();
    }
}
