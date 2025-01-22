<?php

namespace App\Http\Controllers\keluhan;

use App\Http\Controllers\Controller;
use App\Models\keluhan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class keluhanController extends Controller
{
    public function index(){
        $kategori = DB::table('kategori')->get();
        $keluhan = keluhan::orderBy('id_keluhan', 'desc')->get();
        foreach($keluhan as $item){
            $item->daftarUpvote = $item->toUpvote;
        }
        return view('keluhan.keluhan', compact('kategori', 'keluhan'));
    }
    


    public function detailKeluhan(){

        return view('keluhan.detailKeluhan');
    }

    public function addKeluhan(Request $request){
        $judul = $request->title;
        $deskripsi = $request->description;
        $idkategori = $request->category;
        $data = new keluhan();
        $data->id_kategori = $idkategori;
        $data->id_live_account = Auth::user()->toLa->id_live_account;
        $data->judul_keluhan = $judul;
        $data->deskripsi = $deskripsi;
        $data->status_keluhan = 2;
        $data->created_at = now();

        if($data->save()){
            return back()->with('success', 'Keluhan berhasil ditambahkan');
        }
        else{
            return back()->with('error', 'Keluhan gagal ditambahkan');
        }
    }

    public function keluhanAjax(){
        $dataKeluhan = keluhan::orderBy('id_keluhan', 'desc')->get();
        foreach($dataKeluhan as $item){
            $item->daftarUpvote = $item->toUpvote;
        }
        return response()->json(['success' => true, 'dataKeluhan' => $dataKeluhan]);
    }

    public function upvoteKeluhan(Request $request)
{
    $request->validate([
        'id_keluhan' => 'required|integer|exists:keluhan,id_keluhan',
        'username' => 'required|string|max:255',
    ]);

    $upvote = DB::table('upvote')->where('id_keluhan', $request->id_keluhan)->where('username', $request->username)->first();

    if ($upvote) {
        return response()->json(['success' => false, 'message' => 'Upvote already exists']);
    }

    DB::table('upvote')->insert([
        'id_keluhan' => $request->id_keluhan,
        'username' => $request->username,
        'created_at' => now(),
        'updated_at' => now(),
    ]);

    return response()->json(['success' => true, 'message' => 'Upvote added successfully']);
}


}