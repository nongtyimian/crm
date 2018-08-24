<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DtypeController extends Controller
{
    //添加类型
	public function dtype_add(){
		return view("document/dtype");	
	}

	public function dtype_add_do(){
		$data=$_GET;
		$res=DB::table("dym_type")->insert($data);
		if($res){
			return 1;
		}
	}
}
