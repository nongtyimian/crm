<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends CommonController
{
	public function index(){
		return view("index/index");
	}

	public function test(){
		return view("index/test");
	}
    
}
