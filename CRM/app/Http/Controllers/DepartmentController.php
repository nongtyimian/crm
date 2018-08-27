<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DepartmentController extends Controller
{

    //部门展示   温静
    public function department_list( Request $request )
    {
        //查询所有数据
        $crm_dep_get = $res = DB::table('crm_dep') -> get();
//        print_r($crm_dep_get);exit;
        foreach( $crm_dep_get as $k => $v){
            $crm_dep_get[$k]->ctime = date( 'Y-m-d H:i:s' , $v->ctime);
        }
//        print_r($crm_dep_get);exit;

        return view( "department/department_list" , [ 'crm_dep_get' => $crm_dep_get ] );
    }
    //部门添加   温静
    public function department( Request $request )
    {



        $account = $request->session()->get('account');
        $crm_admin_first = $res = DB::table('crm_admin') -> where( 'admin_id' , '=' , $account['admin_name'] ) -> first();
        $admin_name = $crm_admin_first->admin_name;

        return view("department/department" , [ 'admin_name' => $admin_name ]);
    }


    //数据添加
    public function department_add( Request $request ){

        $data = $request -> post();
//        echo 212121212;exit;
        $admin_session = admin_aession();
        if( empty( $data['username'] ) ){
            return[ 'msg'=> '部门名称不能为空' , 'code' => '2' ];
        }
        $insert = [
            'd_name' => $data['username'],
            'ctime' => time(),
            'utime' => time(),
            'starus' => 0,
            'admin_id' => $admin_session->admin_id,
        ];
        print_r($insert);exit;

//        print_r($data);exit;
    }
}
