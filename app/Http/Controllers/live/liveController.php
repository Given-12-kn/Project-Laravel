<?php

namespace App\Http\Controllers\live;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class liveController extends Controller
{
    public function index()
    {
        return view('live.live');
    }
}
