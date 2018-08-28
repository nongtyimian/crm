<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class UserController extends CommonController
{
    public function user_add(){
        $users=DB::table('csm_user')->paginate(3);
        return view("index/user_add",['data'=>$users]);
    }
    public function user_add_do(){
        $users=DB::table('area')->where(['parent_id'=>1])->get();
        $data = json_decode($users,true);
        $arr=DB::table('user_lv')->get();
        $arr = json_decode($arr,true);
        $array=DB::table('user_type')->get();
        $array = json_decode($array,true);
        $date =DB::table('user_souce')->get();
        $date = json_decode($date,true);
        return view("index/user_add_do",['data'=>$data,'arr'=>$arr,'array'=>$array,'date'=>$date]);
    }
    public function user_add_doadd(){
        $username = $_POST['username'];
        $phone = $_POST['phone'];
        $sheng = $_POST['sheng'];
        $arr1=(array)DB::table('area')->where(['area_id'=>$sheng])->first();
        $shengs = $arr1['area_name'];
        $di = $_POST['di'];
        $arr2 =(array)DB::table('area')->where(['area_id'=>$di])->first();
        $dis = $arr2['area_name'];
        $area = $_POST['xian'];
        $arr3 =(array)DB::table('area')->where(['area_id'=>$area])->first();
        $areas = $arr3['area_name'];
        $xiang = $_POST['area'];
        $lass_phone = $_POST['lass_phone'];
        $inter = $_POST['inter'];
        $type = $_POST['type'];
        $dengji = $_POST['dengji'];
        $laiyuan = $_POST['laiyuan'];
        $out_phone = $_POST['out_phone'];
        $xaingmu = $_POST['xaingmu'];
        $remarks = $_POST['remarks'];

        $data = [
            'user_name'=>$username,
            'tel'=>$phone,
            'part'=>$shengs,
            'area'=>$dis,
            'xian'=>$areas,
            'addr'=>$xiang,
            'back_tel'=>$lass_phone,
            'ip'=>$inter,
            'type'=>$type,
            'lv'=>$dengji,
            'source'=>$laiyuan,
            'o_tel'=>$out_phone,
            'project'=>$xaingmu,
            'remark'=>$remarks,
            'ctime'=>time(),
            'status'=>1
        ];
        $data = DB::table('csm_user')->insert($data);
        $where = [
            'user_name'=>$username,
            'tel'=>$phone,
            'part'=>$shengs,
            'area'=>$dis,
            'xian'=>$areas,
            'addr'=>$xiang,
            'back_tel'=>$lass_phone,
            'ip'=>$inter,
            'type'=>$type,
            'lv'=>$dengji,
            'source'=>$laiyuan,
            'o_tel'=>$out_phone,
            'project'=>$xaingmu,
            'remark'=>$remarks,
            'ctime'=>time(),
            'status'=>1
        ];
        $arr_ay=(array)DB::table('csm_user')->where($where)->first();
        $sess = session('account');
        $data_two = [
            'admin_id'=>$sess['admin_name'],
            'user_id'=>$arr_ay['user_id']
        ];
        $res = DB::table('derivation')->insert($data_two);
        if($data){
            return (['font'=>'添加成功','code'=>1]);
        }else{
            return(['font'=>'添加失败','code'=>2]);
        }
    }
    public function user_add_sel(){
        $id = $_POST['parent_id'];
        $users=DB::table('area')->where(['parent_id'=>$id])->get();
        echo $users;
    }

    public function customer_type(){
    $array=DB::table('user_type')->get();
    return view("Share/customer_type",['data'=>$array]);
}
    public function customer_add(){
        return view("Share/customer_add");
    }
    public function customer_add_do(){
       $name = $_POST['lass_phone'];
        $data = [
            't_name'=>$name
        ];
        $res = DB::table('user_type')->insert($data);
        if($data){
            return (['font'=>'添加成功','code'=>1]);
        }else{
            return(['font'=>'添加失败','code'=>2]);
        }
    }
    public function customer_level(){
        $array=DB::table('user_lv')->get();
        return view("Share/customer_level",['data'=>$array]);
    }
    public function customer_level_add(){
        return view("Share/customer_level_add");
    }
    public function customer_level_do(){
        $name = $_POST['lass_phone'];
        $data = [
            'l_name'=>$name
        ];
        $res = DB::table('user_lv')->insert($data);
        if($data){
            return (['font'=>'添加成功','code'=>1]);
        }else{
            return(['font'=>'添加失败','code'=>2]);
        }
    }
    public function customer_source(){
        $array=DB::table('user_souce')->get();
        return view("Share/customer_source",['data'=>$array]);
    }
    public function customer_source_add(){
        return view("Share/customer_source_add");
    }
    public function customer_source_do(){
        $name = $_POST['lass_phone'];
        $data = [
            's_name'=>$name
        ];
        $res = DB::table('user_souce')->insert($data);
        if($data){
            return (['font'=>'添加成功','code'=>1]);
        }else{
            return(['font'=>'添加失败','code'=>2]);
        }
    }
    public function Logon_log(){
        $array=DB::table('log')->paginate(1);
        return view("Login/Logon_log",['data'=>$array]);
    }
    public function user_delete(){
        $data=$_GET;
        $res=DB::table("csm_user")->where(["user_id"=>$data['id']])->delete();
        $admin=session("account");
        $ope=[
            "ope_content"=>2,
            "ope_table"=>"客户表",
            "ope_bec"=>"删除客户",
            "a_id"=>$admin['admin_name'],
            "time"=>time()
        ];
        ope_add($ope);
        if(!$res){
            return ['msg'=>"删除失败",'code'=> 2];
        }
        return ['msg'=>"删除成功",'code'=> 1];
    }
    public function customer_type_del(){
        $data=$_GET;
        $res=DB::table("csm_user")->where(["user_id"=>$data['id']])->delete();
        $admin=session("account");
        $ope=[
            "ope_content"=>2,
            "ope_table"=>"客户表",
            "ope_bec"=>"删除客户",
            "a_id"=>$admin['admin_name'],
            "time"=>time()
        ];
        ope_add($ope);
        if(!$res){
            return ['msg'=>"删除失败",'code'=> 2];
        }
        return ['msg'=>"删除成功",'code'=> 1];
    }
    public function customer_del(){
        $data=$_GET;
        $res=DB::table("user_type")->where(["t_id"=>$data['id']])->delete();
        $admin=session("account");
        $ope=[
            "ope_content"=>2,
            "ope_table"=>"类型表",
            "ope_bec"=>"删除类型",
            "a_id"=>$admin['admin_name'],
            "time"=>time()
        ];
        ope_add($ope);
        if(!$res){
            return ['msg'=>"删除失败",'code'=> 2];
        }
        return ['msg'=>"删除成功",'code'=> 1];
    }
    public function customer_level_del(){
        $data=$_GET;
        $res=DB::table("user_lv")->where(["l_id"=>$data['id']])->delete();
        $admin=session("account");
        $ope=[
            "ope_content"=>2,
            "ope_table"=>"类型表",
            "ope_bec"=>"删除类型",
            "a_id"=>$admin['admin_name'],
            "time"=>time()
        ];
        ope_add($ope);
        if(!$res){
            return ['msg'=>"删除失败",'code'=> 2];
        }
        return ['msg'=>"删除成功",'code'=> 1];
    }

    public function customer_source_del(){
        $data=$_GET;
        $res=DB::table("user_souce")->where(["s_id"=>$data['id']])->delete();
        $admin=session("account");
        $ope=[
            "ope_content"=>2,
            "ope_table"=>"类型表",
            "ope_bec"=>"删除类型",
            "a_id"=>$admin['admin_name'],
            "time"=>time()
        ];
        ope_add($ope);
        if(!$res){
            return ['msg'=>"删除失败",'code'=> 2];
        }
        return ['msg'=>"删除成功",'code'=> 1];
    }
}
