<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class compController extends CommonController
{
	public function c_list(){
		$res=DB::table('crm_manage')->orderBy('crm_manage.ctime','desc')->paginate(6);
		$count=DB::table('crm_manage')->count();
		foreach($res as $k=>$v){
			$v->ctime=date('Y-m-d H:i:s', $v->ctime);
			$v->utime=date('Y-m-d H:i:s', $v->utime);
		}
		return view("comp/list",["res"=>$res,"count"=>$count]);
	}
	public function add(){
		$admin=session("account");
		$id=$admin['admin_name'];
		return view("comp/add",["id"=>$id]);
	}	
	public function adddo(){
		$arr=$_POST;
		$where=[
			'u_id'=>$arr['u_id'],
			'theme'=>$arr['theme'],
			'admin'=>$arr['admin'],
			'idea'=>$arr['idea'],
			'status'=>'否',
			'ctime'=>time(),
			'utime'=>0
		];
		$res=DB::table('crm_manage')->insert($where);
		if($res){
            return (['font'=>'添加成功','code'=>1]);
        }else{
            return(['font'=>'添加失败','code'=>2]);
        }
	}

	public function del(){
		$data=$_GET;
		$res=DB::table('crm_manage')->where(['m_id'=>$data['id']])->delete();
		if($res){
            return (['font'=>'删除成功','code'=>1]);
        }else{
            return(['font'=>'删除失败','code'=>2]);
        }
	}

	public function up(){
		$id=$_GET['id'];
		$res=(array)DB::table('crm_manage')->where(['m_id'=>$id])->get()->first();
		return view("comp/compupdate",["res"=>$res]);
	}
	public function tg(){
		$id=$_GET['id'];
		$where=[
			"status"=>"是",
			"utime"=>time()
		];
		$res=DB::table('crm_manage')->where(['m_id'=>$id])->update($where);
		if($res){
            return (['font'=>'通过成功','code'=>1]);
        }else{
            return(['font'=>'通过失败','code'=>2]);
        }
	}
	public function updo(){
		$arr=$_POST;
		$where=[
			"u_id"=>$arr['u_id'],
			"theme"=>$arr['theme'],
			"idea"=>$arr['idea'],
		];
		$res=DB::table('crm_manage')->where(['m_id'=>$arr['m_id']])->update($where);
		if($res){
            return (['font'=>'修改成功','code'=>1]);
        }else{
            return(['font'=>'修改失败','code'=>2]);
        }
	}
}