<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class OffController extends Controller
{
    //公文展示
    public function off_list( Request $request ){
        //查询所有数据
//        $crm_dep_get = $res = DB::table('crm_dep') -> get();
//        $crm_lim_get = DB::table('crm_lim')
//            -> join('crm_admin', 'crm_admin.admin_id', '=', 'crm_lim.admin_id')
//            -> paginate(10);
////        var_dump($crm_role_get);exit;
//        foreach( $crm_lim_get as $k => $v){
////            print_r($v);exit;
//            $crm_lim_get[$k]->lim_ctime = date( 'Y-m-d H:i:s' , $v->lim_ctime );
//        }
////        exit;
////        print_r($crm_lim_get);exit;
//        //页数
//        $page = $crm_lim_get->currentPage();
//
//        //总条数
//        $crm_lim_count = $res = DB::table('crm_lim') -> count();
//
//        return view( "limit/limit_list" , [ 'crm_lim_get' => $crm_lim_get , 'crm_lim_count' => $crm_lim_count , 'page' => $page ] );
        return view( "off/off_list" );

    }
}
