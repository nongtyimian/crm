<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FunctionController extends CommonController
{
	public function gh(){
		$id=$_GET['id'];
		$res=DB::table('csm_user')->where(['user_id'=>$id])->update(['status'=>3]);
		if($res){
            return (['font'=>'放入成功','code'=>1]);
        }else{
            return(['font'=>'放入失败','code'=>2]);
        }
	}
	public function zhanshi(){
		$res=DB::table('csm_user')->orderBy('csm_user.ctime','desc')->where(['status'=>3])->paginate(6);
		$count=DB::table("csm_user")->count();
		foreach($res as $k=>$v){
			$v->ctime=date('Y-m-d H:i:s', $v->ctime);
		}
		return view("Function/offic",["res"=>$res,"count"=>$count]);
	}

	public function del(){
		$data=$_GET;
		$res=DB::table('csm_user')->where(['user_id'=>$data['id']])->update(['status'=>2]);
		if($res){
            return (['font'=>'删除成功','code'=>1]);
        }else{
            return(['font'=>'删除失败','code'=>2]);
        }
	}

	public function up(){
		$id=$_GET['id'];
		$res=(array)DB::table('csm_user')->where(['user_id'=>$id])->get()->first();
		$res['ctime']=date('Y-m-d H:i:s', $res['ctime']);
		return view("Function/offupdate",["res"=>$res]);
	}
	public function updo(){
		$arr=$_POST;
		$where=[
			"user_name"=>$arr['user_name'],
			"tel"=>$arr['tel'],
			"addr"=>$arr['addr'],
			"type"=>$arr['type'],
			"lv"=>$arr['lv'],
			"source"=>$arr['source'],
			"o_tel"=>$arr['o_tel'],
			"project"=>$arr['project'],
			"remark"=>$arr['remark'],
			"ip"=>$arr['ip'],
			"utime"=>time(),
			"area"=>$arr['area'],
			"part"=>$arr['part'],
			"xian"=>$arr['xian'],
			"back_tel"=>$arr['back_tel']
		];
		$res=DB::table('csm_user')->where(['user_id'=>$arr['user_id']])->update($where);
		if($res){
            return (['font'=>'修改成功','code'=>1]);
        }else{
            return(['font'=>'修改失败','code'=>2]);
        }
	}
}