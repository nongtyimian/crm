<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class OrderController extends Controller
{
    public function order_list(){

		$res = DB::table('crm_order')->orderBy('crm_order.mtime',"desc")->leftjoin("csm_user","csm_user.user_id","=","crm_order.user")
								   ->leftjoin("crm_admin","crm_admin.admin_id","=","crm_order.admin")
								   ->paginate(6);
		$count=DB::table("crm_order")->count();
		$status=[
			"1"=>"正提交",
			"2"=>"处理中",
			"3"=>"运输中",
			"4"=>"已完成"
			
		];
		
		
		return view("order/order_list",["res"=>$res,"status"=>$status,"count"=>$count]);
	}

	public function create_order(){

		//查询当前管理员用户
		$admin=session("account");

		$user=json_decode(DB::table("derivation")->leftjoin("csm_user","csm_user.user_id","=","derivation.user_id")
			
		->where(["admin_id"=>$admin['admin_name']])->get(),true);

		//地址
		 $users=DB::table('area')->where(['parent_id'=>1])->get();
        $data = json_decode($users,true);

		//商品
		$goods=json_decode(DB::table("crm_prodect")->get(),true);


		return view("order/create_order",["user"=>$user,'data'=>$data,"goods"=>$goods]);
	}

	public function sele_user(){
		$data=$_GET;
		$user=(array)DB::table("csm_user")->where(["user_id"=>$data['user_id']])->first();
		return $user;
	}

	public function sele_goods(){
		$goods=json_decode(DB::table("crm_prodect")->get(),true);				
		return view("order/tmp",["goods"=>$goods]);

	}

	public function order_modify(){

		$time=time();
		$rand=rand(100,999);
		$data=$_GET;
		//添加订单表数据
		
		$new['user']=$data['user'];
		$new['o_money']=$data['o_money'];
		$new['t_money']=$data['t_money'];
		$new['o_meth']=$data['o_meth'];
		$new['d_money']=$data['d_money'];
		$new['d_meth']=$data['d_meth'];
		$new['p_meth']=$data['p_meth'];
		$new['tran_money']=$data['tran_money'];
		$new['furl_money']=$data['furl_money'];
		$new['sheng']=$data['sheng'];
		$new['shi']=$data['shi'];
		$new['xian']=$data['xian'];
		$new['addr']=$data['addr'];
		$new['tel']=$data['tel'];
		$new['b_tel']=$data['b_tel'];


		$admin=session('account');
		$new['order']=$time.$rand.$admin['admin_name'];
		$new['admin']=$admin['admin_name'];
		$new['sta']=1;
		$new['mtime']=$time;
		for($i=0;$i<count($data['c_name']);$i++){
			$arr[$i]["c_card"]=$new['order'];
			$arr[$i]['c_name']=$data['c_name'][$i];
			$arr[$i]['price']=$data['price'][$i];
			$arr[$i]['num']=$data['num'][$i];
			$arr[$i]['unit']=$data['unit'][$i];
			$arr[$i]['discount']=$data['discount'][$i];
			$arr[$i]['money']=$data['money'][$i];
			$arr[$i]['status']=1;
			$arr[$i]['ctime']=$time;
		}

		
		//$res=DB::transaction(function () {
			 DB::table("crm_order")->insert($new);

			 foreach($arr as $v){
				DB::table("order_content")->insert($v);	
			 }
		//});


		
	}
	//订单详情
	public function order_view(){
		$id=input::get("id");
		
		$res=DB::table("order_content")->where(['c_card'=>$id])->paginate(3);

		return view("order/order_view",["res"=>$res]);
	}

	//删除订单
	public function order_delete(){
		$id=input::get("id");
		$res=DB::table("crm_order")->where(["o_id"=>$id])->delete();
		if(!$res){
			return ["code"=>2,"msg"=>"操作有误"];
		}

		return ["code"=>1,"msg"=>"删除成功"];
	}
}
