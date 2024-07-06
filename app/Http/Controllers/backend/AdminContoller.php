<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminContoller extends Controller
{
    //adminDashboard
    public function adminDashboard(){
        return view('admin.dashboard');
    }
    // adminLogin
    public function adminLogin(){
        return view('admin.auth.login');
    }
}
