<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FunctionController extends Controller
{
	public function zhanshi(){
		$res=DB::table('offic')->orderBy('offic.o_ctime','desc')->where(['o_status'=>0])->paginate(6);
		$count=DB::table("offic")->count();
		foreach($res as $k=>$v){
			$v->o_ctime=date('Y-m-d H:i:s', $v->o_ctime);
		}
		return view("Function/offic",["res"=>$res,"count"=>$count]);
	}
	public function add(){
		return view("Function/offadd");
	}	
	public function adddo(){
		$arr=$_POST;
		$where=[
			'o_name'=>$arr['o_name'],
			'o_ctime'=>time(),
			'o_sale'=>$arr['o_sale'],
			'o_app'=>$arr['o_app']
		];
		$res=DB::table('offic')->insert($where);
		if($res){
            return (['font'=>'添加成功','code'=>1]);
        }else{
            return(['font'=>'添加失败','code'=>2]);
        }
	}

	public function del(){
		$data=$_GET;
		$res=DB::table('offic')->where(['o_id'=>$data['id']])->update(['o_status'=>1]);
		if($res){
            return (['font'=>'删除成功','code'=>1]);
        }else{
            return(['font'=>'删除失败','code'=>2]);
        }
	}

	public function up(){
		$id=$_GET['id'];
		$res=(array)DB::table('offic')->where(['o_id'=>$id])->get()->first();
		$res['o_ctime']=date('Y-m-d H:i:s', $res['o_ctime']);
		return view("Function/offupdate",["res"=>$res]);
	}
	public function updo(){
		$arr=$_POST;
		$where=[
			"o_name"=>$arr['o_name'],
			"o_sale"=>$arr['o_sale'],
			"o_app"=>$arr['o_app'],
			"o_ctime"=>time()
		];
		$res=DB::table('offic')->where(['o_id'=>$arr['o_id']])->update($where);
		if($res){
            return (['font'=>'修改成功','code'=>1]);
        }else{
            return(['font'=>'修改失败','code'=>2]);
        }
	}
}