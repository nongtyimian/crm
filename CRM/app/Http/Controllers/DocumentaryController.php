<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DocumentaryController extends Controller
{
    //跟单展示
	public function documentary_list(){
		$res = DB::table('crm_dym')->leftjoin("csm_user","csm_user.user_id","=","crm_dym.u_id")
								   ->leftjoin("crm_admin","crm_admin.admin_id","=","crm_dym.a_id")
								   ->paginate(3);
		$count=DB::table("crm_dym")->count();
		
		
		return view("document/documentary_list",["res"=>$res,'count'=>$count]);
	}

	public function documentary_add(){
		//跟单类型
		$type=json_decode(DB::table("dym_type")->get(),true);
		//跟单数据
		$pgs=json_decode(DB::table("dym_pgs")->get(),true);
		//用户数据
		$user=json_decode(DB::table("csm_user")->get(),true);
        //提前时间
		$time=json_decode(DB::table("dym_rtime")->get(),true);
		return view("document/document_add",["type"=>$type,"pgs"=>$pgs,'user'=>$user,'time'=>$time]);
	}
}
