<?php

namespace App\Http\Controllers\live;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class liveController extends Controller
{
    public function index()
    {
        return view('live.live');
    }
}
