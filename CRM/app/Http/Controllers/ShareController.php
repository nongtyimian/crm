<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class ShareController extends CommonController
{
    //客户共享
    public function share_user(){
        $sess = session('account');
        $users = DB::table('derivation')
            ->join('csm_user', 'derivation.user_id', '=', 'csm_user.user_id')
            ->where(['admin_id'=>$sess['admin_name']])
            ->paginate(3);
        $data = json_decode($users,true);
        return view("Share/share_user",['data'=>$users]);
    }
    public function share_user_do(){
        $sess = session('account');
        $users = DB::table('crm_admin')->get();
        $users = json_decode($users,true);
        $users_two = DB::table('derivation')
            ->join('csm_user', 'derivation.user_id', '=', 'csm_user.user_id')
            ->where(['admin_id'=>$sess['admin_name']])
            ->get();
        $users_two = json_decode($users_two,true);
        return view("Share/share_user_do",['data'=>$users,'arr'=>$users_two]);
    }
    public function share_add_doadd(){
        $username = $_POST['di'];
        $phone = $_POST['xian'];
        $where=[
            'admin_id'=>$username,
            'user_id'=>$phone
        ];
        $data = DB::table('derivation')->where($where)->first();
        if($data){
            return (['font'=>'管理员已拥有该用户','code'=>2]);
        }else{
            $res = DB::table('derivation')->insert($where);
            if($res){
                return (['font'=>'共享成功','code'=>1]);
            }else{
                return(['font'=>'共享失败','code'=>2]);
            }
        }

    }
}
