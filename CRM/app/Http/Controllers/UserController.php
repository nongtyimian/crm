<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{
    public function user_add(){
        $users=DB::table('csm_user')->get();
        $data = json_decode($users,true);
        return view("index/user_add",['data'=>$data]);
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

}
