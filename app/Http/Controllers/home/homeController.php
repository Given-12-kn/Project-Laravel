<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class homeController extends Controller
{
    public function index()
    {
        return view('home.home2');
    }

    public function sendChat(Request $request)
    {
        //Simpan data (misal ke database)

        $chat = new chat();
        $chat->addChat(Auth::user()->nrp, $request->chat, date('Y'));

        return response()->json(['message' => 'Pesan berhasil diterima!'], 200);
    }

    public function loadMessage()
    {
        $data = chat::limit(500)->get();
        return response()->json($data);
    }
}
