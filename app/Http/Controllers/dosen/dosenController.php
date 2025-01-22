<?php

namespace App\Http\Controllers\dosen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\keluhan;


class dosenController extends Controller
{
    public function index()
    {
        $kategori = DB::table('kategori')->get();
        $keluhan = keluhan::orderBy('id_keluhan', 'desc')->get();
        foreach($keluhan as $item){
            $item->daftarUpvote = $item->toUpvote;
        }
        return view('dosen.dosenKeluhan',compact('kategori', 'keluhan'));
    }

    public function detailKeluhan($id)
    {
        $keluhan = DB::table('keluhan')->where('id_keluhan', $id)->first();
        $respon = DB::table('respon_keluhan')->where('id_keluhan', $id)->first();
        return view('dosen.dosenDetailKeluhan', compact('keluhan', 'respon'));
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

    public function live(){
        return view('dosen.dosenLive');
    }
}
