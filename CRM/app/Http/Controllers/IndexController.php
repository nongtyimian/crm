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
	//当前日期有无事件
	public function layout(){
		$admin=session("account");
		$id=$admin['admin_name'];
		$time=date('Y-m-d H:i:s', time()); 
		//echo $time;exit;
		$time2=date('Y-m-d', time()); 
		$res=json_decode(DB::table('pers')->where(['p_date'=>$time2,'a_id'=>$id])->get(),true);
		return view("index/layout",["time"=>$time,"res"=>$res]);
	}

	//个人中心
	public function my(){
		$admin=session("account");
		$id=$admin['admin_name'];
		$res=(array)DB::table('crm_pers')->where(['a_id'=>$id])->get()->first();
		return view("index/my",["res"=>$res]);
	}
	public function myup(){
		$id=$_GET['id'];
		$res=(array)DB::table('crm_pers')->where(['a_id'=>$id])->get()->first();
		return view("index/myupdate",["res"=>$res]);
	}
	public function myupdo(){
		$arr=$_POST;
		$where=[
			"a_name"=>$arr['a_name'],
			"a_tel"=>$arr['a_tel'],
			"a_ema"=>$arr['a_ema'],
			"a_sex"=>$arr['a_sex']
		];
		$res=DB::table('crm_pers')->where(['a_id'=>$arr['a_id']])->update($where);
		if($res){
            return (['font'=>'修改成功','code'=>1]);
        }else{
            return(['font'=>'修改失败','code'=>2]);
        }
	}
}
