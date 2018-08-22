<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    //登录页面 温静
    public function login( Request $request ){
    	// echo 1212121;exit;

		return view("Login/login");

    }
}
