<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class chat extends Model
{
    protected $connection = "mysql";
    protected $table = 'chat';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;

    protected $fillable = [
        'id',
        'nrp_siswa',
        'chat',
        'periode',
        'created_at',
    ];

    public function addChat($nrp_siswa, $chat, $periode) {
        $baru = new chat();
        $baru->nrp_siswa = $nrp_siswa;
        $baru->chat = $chat;
        $baru->periode = $periode;
        $baru->save();
    }
}
