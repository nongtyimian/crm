<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    //员工展示   温静
    public function account_list( Request $request )
    {
        //查询所有数据
        $crm_admin_get = $res = DB::table('crm_admin') -> get();
//        $crm_dep_get = $res = DB::table('crm_dep') -> paginate(5);
//        print_r($crm_admin_get);exit;
        foreach( $crm_admin_get as $k => $v){
            $crm_admin_get[$k]->time = date( 'Y-m-d H:i:s' , $v->time);
        }
//        print_r($crm_admin_get);exit;

        //总条数
        $crm_admin_count = $res = DB::table('crm_admin') -> count();
        //分页
//        $users = DB::table('crm_dep')->paginate(5);
//        print_r($users);exit;

        return view( "admin/account_list" , [ 'crm_admin_get' => $crm_admin_get , 'crm_admin_count' => $crm_admin_count ] );
    }
    //部门添加   温静
//    public function department( Request $request )
//    {
//
//
//
//        $account = $request->session()->get('account');
//        $crm_admin_first = $res = DB::table('crm_admin') -> where( 'admin_id' , '=' , $account['admin_name'] ) -> first();
//        $admin_name = $crm_admin_first->admin_name;
//
//        return view("department/department" , [ 'admin_name' => $admin_name ]);
//    }
//
//
//    //数据添加
//    public function department_add( Request $request ){
//
//        $data = $request -> post();
////        echo 212121212;exit;
//        $admin_session = admin_aession();
//        if( empty( $data['username'] ) ){
//            return[ 'msg'=> '部门名称不能为空' , 'code' => '2' ];
//        }
//        $crm_dep_first = $res = DB::table('crm_dep') -> where( 'd_name' , '=' , $data['username'] ) -> first();
//
//        if( !empty( $crm_dep_first ) ){
//            return[ 'msg'=> '部门名称已存在' , 'code' => '2' ];
//        }
//
//        $insert = [
//            'd_name' => $data['username'],
//            'ctime' => time(),
//            'utime' => time(),
//            'status' => 0,
//            'admin_id' => $admin_session->admin_id,
//        ];
//        $crm_dep_insert = DB::table('crm_dep') -> insert( $insert );
////        print_r($crm_dep_first);exit;
//        if( !$crm_dep_insert ){
//            return[ 'msg'=> '部门添加失败' , 'code' => '2' ];
//        }
//
//
//        return[ 'msg'=> '部门添加成功' , 'code' => '1' ];
//
//    }


    //是否启用
    public function account_is( Request $request ){
        $data = $request -> post();
//        print_r($data);exit;
//        $is = '';
        if( empty( $data['status'] ) && empty( $data['ids'] ) ){
            return[ 'msg'=> '系统错误' , 'code' => '2' ];
        }
        if( $data['status'] == 0 ){
            $is = 1;
        }
        if( $data['status'] == 1 ){
            $is = 0;
        }

        $update = [
            'status' => $is,
        ];
        $where = [
            'admin_id' => $data['ids'],
        ];
        $upde = DB::table('crm_admin')
            ->where( $where )
            ->update( $update );
//        dd($upde);exit;


        if( !$upde ){
            return[ 'msg'=> '系统错误' , 'code' => '2' ];
        }
//        if( $is == 1){
//            $data .= '<span class="layui-btn layui-btn-sm layui-btn-radius layui-btn-normal is" onclick="student_is( '.$data['ids'].' , '.$is.' )" >已启用</span>';
////            return[ 'msg'=> '已启用' , 'code' => '1' , 'data' => $data , 'ids' => $data['ids']];
//        }
//        if( $is == 0){
//            $data .= '<span class="layui-btn layui-btn-sm layui-btn-radius layui-btn-primary is" onclick="student_is( '.$data['ids'].' , '.$is.' )" >未启用</span>';
////            return[ 'msg'=> '已禁用' , 'code' => '1' , 'data' => $data  , 'ids' => $data['ids'] ];
//        }

        ///替换整个数据foreach

        //查询所有数据

        $crm_dep_get = $res = DB::table('crm_admin') ->get();
//        dd($crm_dep_get);exit;
        $arr = '';
        $arrs = '';
        foreach( $crm_dep_get as $k => $v ){
            if( $v->status == 1){
                $arrs = '<span class="layui-btn layui-btn-sm layui-btn-radius layui-btn-normal is" onclick="student_is( '.$v->admin_id.' , '.$v->status.' )" >已通过审核</span>';
//            return[ 'msg'=> '已启用' , 'code' => '1' , 'data' => $data , 'ids' => $data['ids']];
            }
            if( $v->status == 0){
                $arrs = '<span class="layui-btn layui-btn-sm layui-btn-radius layui-btn-primary is" onclick="student_is( '.$v->admin_id.' , '.$v->status.' )" >未通过审核</span>';
//            return[ 'msg'=> '已禁用' , 'code' => '1' , 'data' => $data  , 'ids' => $data['ids'] ];
            }
            $arr .= '<tr>
                        <td>
                            <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id=\'2\'>
                            <i class="layui-icon">&#xe605;</i></div>
                        </td>
                        <td>'. $v->admin_id .'</td>
                        <td>'. $v->admin_name .'</td>
                        <td>'. date( 'Y-m-d H:i:s' , $v->time) .'</td>
                        <td class="td-status"> '.$arrs.' </td>
                        <td class="td-manage">
                            <a onclick="member_stop(this,\'10001\')" href="javascript:;" title="下载">
                                <i class="layui-icon">&#xe601;</i>
                            </a>
                            <a title="编辑" onclick="x_admin_show(\'编辑\',\'admin-edit.html\')" href="javascript:;">
                                <i class="layui-icon">&#xe642;</i>
                            </a>
                            <a title="删除" onclick="member_del(this,\'要删除的id\')" href="javascript:;">
                                <i class="layui-icon">&#xe640;</i>
                            </a>
                        </td>
                    </tr>';
        }


//        dd($arr);exit;
        return[ 'code' => '1' , 'data' => $arr , 'is' => $is ];

    }

}
