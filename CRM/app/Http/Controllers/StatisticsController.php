<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class StatisticsController extends CommonController
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

	//数据统计
	public function statistics_list(){
			$admin=session("account");

			$admin=(array)DB::table("crm_admin")->where(["admin_id"=>$admin['admin_name']])->first();
			
			//print_r($admin);exit;
		if($admin['role']!=1){
			
			  $res[$k]['admin_name']=$admin;
			$res[0]['user_count']=DB::table("derivation")->where(['admin_id'=>$admin['admin_id']])->count();
			$res[0]['dym_count']=DB::table("crm_dym")->where(['a_id'=>$admin['admin_id']])->count();
			$res[0]['order_count']=DB::table("crm_order")->where(['admin'=>$admin['admin_id']])->count();
			$res[0]['success_count']=DB::table("crm_order")->where(['admin'=>$admin['admin_id'],"sta"=>4])->count();;
			$res[0]['update_count']=DB::table("crm_ope")->where(['ope_content'=>2])->count();
			$res[0]['del_count']=DB::table("crm_ope")->where(['ope_content'=>3])->count();
		}else{
			 //管理员
			$res=json_decode(DB::table("crm_admin")->get(),true);

			foreach($res as $k=>$v){
				$res[$k]['user_count']=DB::table("derivation")->where(['admin_id'=>$v['admin_id']])->count();
			$res[$k]['dym_count']=DB::table("crm_dym")->where(['a_id'=>$v['admin_id']])->count();
			$res[$k]['order_count']=DB::table("crm_order")->where(['admin'=>$v['admin_id']])->count();
			$res[$k]['success_count']=DB::table("crm_order")->where(['admin'=>$v['admin_id'],"sta"=>4])->count();;
			$res[$k]['update_count']=DB::table("crm_ope")->where(['ope_content'=>2,"a_id"=>$v['admin_id']])->count();
			$res[$k]['del_count']=DB::table("crm_ope")->where(['ope_content'=>3,"a_id"=>$v['admin_id']])->count();
			}
			

			
		}
		
		

		
		

		return view("stat/stat_list",["admin"=>$res]);
	}
}
