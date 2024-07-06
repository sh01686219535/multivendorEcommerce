<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //index
    public function index(){
        return view('frontend.dashboard.dashboard');
    }
}
