<?php

namespace App\Http\Controllers;

use App\Imports\ImportExcel;
use App\Models\keluhan;
use App\Models\live_account;
use App\Models\live_session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Facades\Excel;

class adminController extends Controller
{
    public function index(){
        return view('home.adminAccViews');
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

        $live = live_session::where('showing', 1)->first();

        return view('home.adminLiveSetting',compact('bladeStatus', 'live'));
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

    public function accView(){
        $dataLs = live_session::all();
        return view('home.adminAccViews', compact('dataLs'));
    }

    public function accView2(){
        $dataKl = keluhan::all();
        return view('home.adminAccViews2', compact('dataKl'));
    }

    public function accView3(){
        $dataLs = live_session::all();
        $dataKl = keluhan::all();
        return view('home.adminListAcc', compact('dataLs', 'dataKl'));
    }

    public function checkAcc(Request $request){
        $id = $request->id;
        $action = $request->action;

        if($action == 'accept'){
            $data = live_session::find($id);
            $data->is_acc = 1;

            if($data->update()){
                return response()->json(['success' => true]);
            }
        }
        else{
            $data = live_session::find($id);
            $data->is_acc = 0;

            if($data->update()){
                return response()->json(['success' => true]);
            }
        }

        return response()->json(['success' => false, 'message' => $action]);
    }

    public function checkAcc2(Request $request){
        $id = $request->id;
        $action = $request->action;

        if($action == 'accept'){
            $data = keluhan::find($id);
            $data->status_keluhan = 1;

            if($data->update()){
                return response()->json(['success' => true]);
            }
        }
        else{
            $data = live_session::find($id);
            $data->status_keluhan = 0;

            if($data->update()){
                return response()->json(['success' => true]);
            }
        }

        return response()->json(['success' => false, 'message' => $action]);
    }

    public function countData(Request $request){
        // $dataLs = live_session::all();
        $data = live_session::select('is_acc')->where('is_acc', 2)->get();
        $count = count($data);
        // $count = live_session::where('is_acc', 2)->count();

        return response()->json(['success' => true, 'count' => $count]);
    }

    public function countData2(Request $request){
        // $dataLs = live_session::all();

        $data = keluhan::select('status_keluhan')->where('status_keluhan', 2)->get();
        $count = count($data);
        return response()->json(['success' => true, 'count' => $count]);
    }

    public function updateShowing(Request $request)
    {
        $legth = live_session::count();

        if($request->id_live_session < $legth){
            $live = live_session::findOrFail($request->id_live_session);
            $live->showing = !$live->showing;
            $live->save();

            $livenext = live_session::findOrFail($request->id_live_session+1);
            $livenext->showing = !$livenext->showing;
            $livenext->save();
        }

        return redirect("/home/admin/liveSetting");
    }

    public function updateShowingprev(Request $request)
    {

        if($request->id_live_session > 1){
            $live = live_session::findOrFail($request->id_live_session);
            $live->showing = !$live->showing;
            $live->save();

            $liveprev = live_session::findOrFail($request->id_live_session-1);
            $liveprev->showing = !$liveprev->showing;
            $liveprev->save();
        }

        return redirect("/home/admin/liveSetting");
    }

}
