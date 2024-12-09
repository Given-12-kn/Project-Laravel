<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class resetPassword extends Controller
{
    public function index(){
        return view('form.resetPassword');
    }
}
