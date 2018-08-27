<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatisticsController extends Controller
{	
	//操作记录展示
    public function	 ope_list(){
		$res=DB::table('crm_ope')->orderBy('crm_ope.time',"desc")
								   ->leftjoin("crm_admin","crm_admin.admin_id","=","crm_ope.a_id")
								   ->paginate(6);
		$status=[
			"1"=>"添加",
			"2"=>"修改",
			"3"=>"删除"
		];

		return view("stat/ope_list",["res"=>$res,"status"=>$status]);
	}
}
