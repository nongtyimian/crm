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
								   ->paginate(1);
		$count=DB::table("crm_dym")->count();
		
		
		return view("document/documentary_list",["res"=>$res,'count'=>$count]);
	}
}
