<?php

namespace App\Http\Controllers\live;

use App\Http\Controllers\Controller;
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

        $liveSession = live_session::create([
            'id_live_account' => Auth::id(),
            'content' => $request->input('content'),
            'periode' => now()->year,
            'is_archive' => 0,
            'is_acc' => NULL,
            'created_at' => now(),
        ]);

        // Kembalikan respons JSON
        return response()->json([
            'status' => 'success',
            'message' => 'Pesan berhasil disimpan!',
            'data' => $liveSession,
        ]);
    }

}
