<?php

namespace App\Http\Controllers\live;

use App\Http\Controllers\Controller;
use App\Models\keluhan;
use Illuminate\Http\Request;
use App\Models\live_session;
use Illuminate\Support\Facades\Auth;

class liveController extends Controller
{
    public function index()
    {
        $status = file_get_contents(base_path('.env'));

        $bladeStatus = null;

        if (preg_match('/^BLADE1_STATUS=(.*)$/m', $status, $matches)) {
            $bladeStatus = trim($matches[1]);
        }

        if($bladeStatus == 'false'){
            return redirect('home/')->with('error', 'Live is not available yet');
        }

        return view('live.live');
    }

    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        // $liveSession = live_session::create([
        //     'id_live_account' => Auth::id(),
        //     'content' => $request->content,
        //     'periode' => now()->year,
        //     'is_archive' => 0,
        //     'is_acc' => NULL,
        //     'created_at' => now(),
        // ]);

        $liveSession = new live_session();
        $liveSession->id_live_account = Auth::user()->toLa->id_live_account;
        $liveSession->content = $request->content;
        $liveSession->periode = now()->year;
        $liveSession->is_archive = 0;
        $liveSession->is_acc = 2;
        $liveSession->created_at = now();

        if($liveSession->save()){
            return response()->json([
                'status' => 'success',
                'message' => 'Pesan berhasil disimpan!',
            ]);
        }
        else{
            return response()->json([
                'status' => 'error',
                'message' => 'Pesan gagal disimpan!',
            ]);
        }
    }

    public function dataChat(){
        $data = live_session::orderBy('id_live_session', 'desc')
        ->take(200)
        ->get();
        return response()->json([
            'status' => 'success',
            'data' => $data,
        ]);
    }

}
