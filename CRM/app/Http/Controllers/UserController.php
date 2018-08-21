<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //
    public function user_add(){
        return view("index/user_add");
    }
    public function user_add_do(){
        return view("index/user_add_do");
    }

}
