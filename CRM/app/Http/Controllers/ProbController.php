<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProbController extends Controller
{
	public function zhanshi(){
		$res=DB::table('crm_prodect')->orderBy('crm_prodect.ctime','desc')->where(['status'=>0])->paginate(6);
		$count=DB::table("crm_prodect")->count();
		foreach($res as $k=>$v){
			$v->ctime=date('Y-m-d H:i:s', $v->ctime);
			$v->utime=date('Y-m-d H:i:s', $v->utime);
		}
		return view("prob/prob_list",["res"=>$res,"count"=>$count]);
	}
	public function add(){
		return view("prob/probadd");
	}	
	public function adddo(){
		$arr=$_POST;
		$where=[
			'p_name'=>$arr['p_name'],
			'ctime'=>time(),
			'p_price'=>$arr['p_price'],
			'utime'=>time(),
			'status'=>0
		];
		$res=DB::table('crm_prodect')->insert($where);
		if($res){
            return (['font'=>'添加成功','code'=>1]);
        }else{
            return(['font'=>'添加失败','code'=>2]);
        }
	}

	public function del(){
		$data=$_GET;
		$res=DB::table('crm_prodect')->where(['p_id'=>$data['id']])->update(['status'=>1]);
		if($res){
            return (['font'=>'删除成功','code'=>1]);
        }else{
            return(['font'=>'删除失败','code'=>2]);
        }
	}

	public function up(){
		$id=$_GET['id'];
		$res=(array)DB::table('crm_prodect')->where(['p_id'=>$id])->get()->first();
		$res['ctime']=date('Y-m-d H:i:s', $res['ctime']);
		$res['utime']=date('Y-m-d H:i:s', $res['utime']);
		//print_r($res);exit;
		return view("prob/probupdate",["res"=>$res]);
	}
	public function updo(){
		$arr=$_POST;
		$where=[
			'p_name'=>$arr['p_name'],
			'p_price'=>$arr['p_price'],
			'utime'=>time(),
		];
		$res=DB::table('crm_prodect')->where(['p_id'=>$arr['p_id']])->update($where);
		if($res){
            return (['font'=>'修改成功','code'=>1]);
        }else{
            return(['font'=>'修改失败','code'=>2]);
        }
	}
}