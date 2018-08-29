<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
class DocumentaryController extends CommonController
{
    //跟单展示
	public function documentary_list(){
		$res = DB::table('crm_dym')->orderBy('crm_dym.ctime',"desc")->leftjoin("csm_user","csm_user.user_id","=","crm_dym.u_id")
								   ->leftjoin("crm_admin","crm_admin.admin_id","=","crm_dym.a_id")
								   ->paginate(6);
		$count=DB::table("crm_dym")->count();
		
		
		return view("document/documentary_list",["res"=>$res,'count'=>$count]);
	}

	//添加页面
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

	//新增
	public function documentary_add_do(){
		$admin=session("account");
		$data=$_GET;
		$data['ntime']=strtotime($data['ntime']);
		$time=time();
		$data['a_id']=$admin['admin_name'];
		$data['ctime']=$time;
		$data['utime']=$time;
		$res=DB::table("crm_dym")->insert($data);

		$ope=[
			"ope_content"=>1,
			"ope_table"=>"跟单表",
			"ope_bec"=>"增加客户跟单",
			"a_id"=>$admin['admin_name'],
			"time"=>$time
		];

		ope_add($ope);

		if($res){
			return 1;
		}
	}

	//删除
	public function documentary_del(){
		$data=$_GET;
		$res=DB::table("crm_dym")->where(["dym_id"=>$data['id']])->delete();
		$admin=session("account");

		$ope=[
			"ope_content"=>2,
			"ope_table"=>"跟单表",
			"ope_bec"=>"删除客户跟单",
			"a_id"=>$admin['admin_name'],
			"time"=>time()
		];

		ope_add($ope);

		if(!$res){
			  return ['msg'=>"删除失败",'code'=> 2];
			//return $arr['code']=1;
		}
		return ['msg'=>"删除成功",'code'=> 1];
	}

	public function dtype_update(){

		$id=input::get("id");
		$dym=(array)DB::table("crm_dym")->where(["dym_id"=>$id])->first();

		//用户
		$user=$this->select("csm_user","user_id","u_id",$dym);

		//跟单类型

		$type=$this->select("dym_type","t_name","type",$dym);
		//跟单数据
		

		$pgs=$this->select("dym_pgs","p_name","pgs",$dym);
		
        //提前时间
		
		$time=$this->select("dym_rtime","r_name","rtime",$dym);


		return view("document/update",["dym"=>$dym,"user"=>$user,"type"=>$type,"pgs"=>$pgs,"time"=>$time]);
	}
	//公共方法
	public function select($table,$id,$oneid,$dym){
		$user=json_decode(DB::table($table)->get(),true);

		foreach($user as $k=>$v){
			if($v[$id]==$dym[$oneid]){
				$user[$k]['cs']="selected";	
			}else{
			   $user[$k]['cs']="";	
			}
		}
		
		return $user;
	}

	public function documentary_update_do(){
		$admin=session("account");
		$data=input::all();
		$data['utime']=time();
		$data['ntime']=strtotime($data['ntime']);
		$data['a_id']=$admin['admin_name'];

		$res=DB::table("crm_dym")->where(["dym_id"=>$data['dym_id']])->update($data);

		$ope=[
			"ope_content"=>3,
			"ope_table"=>"跟单表",
			"ope_bec"=>"修改客户跟单",
			"a_id"=>$admin['admin_name'],
			"time"=>time()
		];
		if(!$res){
			return ["code"=>2,"msg"=>"数据异常"];
		}
		ope_add($ope);
		return ["code"=>1,"msg"=>"修改成功"];
	}

	public function remind(){
		$admin=session("account");
		$admin_id=$admin["admin_name"];
		$time=time();
		$arr=json_decode(DB::table("crm_dym")->where(["a_id"=>$admin_id])->join("csm_user","user_id","=","u_id")->get(),true);
		foreach($arr as $k=>$v){
			if($time<$v['ntime']&&($v['ntime']-$time)<=$v['rtime']*24*60*60){
				$ar[$k]=$v;
			}
		}
		

		return view("document/remind",["ar"=>$ar]);
	}

	public function open_order(){
		
		if(!empty(session("order"))){
			$order=session("order");
			$admin=session("account");
			session(["order"=>null]);
			$arr=(array)DB::table('crm_order')->where(["admin"=>$admin["admin_name"]])
								   ->leftjoin("crm_admin","crm_admin.admin_id","=","crm_order.admin")
	
								   ->first();
			return $arr; 
			
		}else{
			return "die";
		}
		
	}
	
	public function order_on(){
		return view("document/order_on");
	}	
}
