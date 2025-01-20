<?php

namespace App\Http\Controllers;

use App\Imports\ImportExcel;
use App\Models\live_account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class adminController extends Controller
{
    public function index(){
        return view('home.adminPage');
    }

    public function importExcel(Request $request){

        if($request->file('excel') == null){
            return back()->with('error', 'Data Gagal Diimport');
        }
        $request->validate([
            'email' => 'email',
            'nrp' => 'integer',
            'role_account' => 'string',
            'is_active' => 'boolean',
        ]);

       Excel::import(new ImportExcel, $request->file('excel'));
       if($request->file('excel') == null){
           return back()->with('error', 'Data Gagal Diimport');
       }
       else{
           return back()->with('success', 'Data Berhasil Diimport');
       }
    }

    public function excel(){
        return view('home.adminExcel');
    }

    public function keluhan(){
        return view('home.adminExcel');
    }

    public function daftarSiswa(){
        $data = live_account::all();

        return view('home.adminListSiswa', compact('data'));
    }

    public function liveSetting(){
        $status = file_get_contents(base_path('.env'));

        $bladeStatus = null;

        if (preg_match('/^BLADE1_STATUS=(.*)$/m', $status, $matches)) {
            $bladeStatus = trim($matches[1]);
        }
        return view('home.adminLiveSetting',compact('bladeStatus'));
    }

    public function turnLive(Request $request){
        $status = $request->chat === 'true' ? 'true' : 'false';

        // Path ke file .env
        $envPath = base_path('.env');

        if (file_exists($envPath)) {
            $envContents = file_get_contents($envPath);

            // Update status BLADE1_STATUS
            $updatedContents = preg_replace(
                '/^BLADE1_STATUS=.*/m',
                'BLADE1_STATUS=' . $status,
                $envContents
            );

            if ($envContents !== $updatedContents) {
                file_put_contents($envPath, $updatedContents);

            } else {

                return response()->json([
                    'success' => false,
                    'message' => $status,
                ]);
            }
        } else {
            return response()->json([
                'success' => false,
                'message' => 'File .env not found.'
            ]);
        }

        // Clear konfigurasi cache setelah update
        Artisan::call('config:clear');
        Artisan::call('config:cache');
        return response()->json([
            'success' => true,
            'message' => 'BLADE1_STATUS updated to ' . $status
        ]);
    }

    public function editStatusSiswa(Request $request){
        $request->validate([
            'liveAcId' => 'required|integer',
            'action' => 'required|in:activate,deactivate',
        ]);

        $account = live_account::find($request->liveAcId);

        if ($account) {
            $account->is_active = ($request->action === 'activate') ? 1 : 0;
            $account->update();

            return response()->json(['success' => true]);
        }

        return response()->json(['success' => false], 404);
    }

    public function load(Request $request){
        $idLa = $request->liveAcId;
        if($request->Active){
            $data = live_account::find($idLa);
            $data->is_active = 1;
            $data->update();
        }
        else if($request->Deactivate){
            $data = live_account::find($idLa);
            $data->is_active = 0;
            $data->update();
        }
        return back();
    }
}
