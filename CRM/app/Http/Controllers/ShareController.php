<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class ShareController extends Controller
{
    //客户共享
    public function share_user(){
        $sess = session('account');
        $users = DB::table('derivation')
            ->join('csm_user', 'derivation.user_id', '=', 'csm_user.user_id')
            ->where(['admin_id'=>$sess['role']])
            ->paginate(3);
        $data = json_decode($users,true);
//        print_r($users);exit;
//        foreach($users as $k=>$v){
//            $data[] = DB::table('csm_user')
//                ->where(['user_id'=>$v['user_id']])
//                ->get();
//        }
//        print_r($data);exit;
//        $users=DB::table('csm_user')->paginate(3);
        return view("Share/share_user",['data'=>$users]);
    }
    public function share_user_do(){
        $data = session('account');
        print_r($data);exit;
        $users = DB::table('derivation')->get();
        return view("Share/share_user_do");
    }
}
