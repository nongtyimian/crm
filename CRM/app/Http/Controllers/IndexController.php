<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class IndexController extends CommonController
{
	public function index(){
		return view("index/index");
	}

	public function test(){
		return view("index/test");
	}
    
	public function pers(){
		return view("index/pers");
	}

	public function per_list(){
		return view("index/per_list");
	}

	public function per_add(){
		$val=$_GET['val'];
		$date=$_GET['date'];
		$res=DB::table('pers')->insert(['p_name'=>$val,'p_date'=>$date]);
		if($res){
            return (['font'=>'添加成功','code'=>1]);
        }else{
            return(['font'=>'添加失败','code'=>2]);
        }
	}
}
