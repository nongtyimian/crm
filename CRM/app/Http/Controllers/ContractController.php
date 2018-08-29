<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class ContractController extends CommonController

{
    public function contract_list(){
        $users=DB::table('crm_ctt')->paginate(3);

        return view("contract/contract_list",['data'=>$users]);
    }
    public function contract_add(){
        $array=DB::table('csm_user')->get();
        $arr=DB::table('hetong')->get();
        return view("contract/contract_add",['arr'=>$arr,'array'=>$array]);
    }
    public function contract_add_do(){
        $admin = session('account');
        $data = $_POST;
        $username = $data['name'];
        $money = $_POST['money'];
        $lass_phone = $_POST['lass_phone'];
        $inter = $_POST['inter'];
        $type = $_POST['type'];
        $type1 = $_POST['type1'];
        $time = $_POST['time'];
        $times = $_POST['times'];
        $remarks = $_POST['remarks'];
        $datas = [
            'ctt_card'=>rand(9999,10000),
            'u_id'=>$type1,
            'hsel'=>$username,
            'return'=>$money,
            'business'=>$lass_phone,
            'area'=>$inter,
            'type'=>$type,
            'otime'=>$time,
            'etime'=>$times,
            'text'=>$remarks,
            'admin'=>$admin['admin_name']
        ];
        $data = DB::table('crm_ctt')->insert($datas);
        if($data){
            return (['font'=>'添加成功','code'=>1]);
        }else{
            return(['font'=>'添加失败','code'=>2]);
        }
    }
    public function contract_del(){
        $data=$_GET;
        $res=DB::table("crm_ctt")->where(["ctt_id"=>$data['id']])->delete();
        $admin=session("account");

        $ope=[
            "ope_content"=>2,
            "ope_table"=>"合同记录",
            "ope_bec"=>"删除合同记录",
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
