<?php

namespace App\Http\Controllers\home;

use App\Http\Controllers\Controller;
use App\Models\chat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class homeController extends Controller
{
    public function index()
    {
        return view('home/home');
    }

    public function sendChat(Request $request)
    {
        $request->validate([
            'chat' => 'required|string|max:255',
        ],
        [
            'chat.required' => 'Pesan harus diisi!',
            'chat.string' => 'Pesan harus berupa teks!',
            'chat.max' => 'Pesan terlalu panjang!',
        ]);


        //Simpan data (misal ke database)
        chat::create(['chat' => $request->chat]);

        return response()->json(['message' => 'Pesan berhasil diterima!'], 200);
    }
}
