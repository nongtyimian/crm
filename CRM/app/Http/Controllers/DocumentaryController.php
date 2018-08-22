<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DocumentaryController extends Controller
{
    //跟单展示
	public function documentary_list(){
		return view("document/documentary_list");
	}
}
