<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class RoleController extends CommonController
{
    //角色展示   温静
    public function role_list( Request $request )
    {
        //查询所有数据
//        $crm_dep_get = $res = DB::table('crm_dep') -> get();
        $crm_role_get = DB::table('crm_role')
            -> join('crm_admin', 'crm_admin.admin_id', '=', 'crm_role.admin_id')
            -> paginate(10);
//        var_dump($crm_role_get);exit;
        foreach( $crm_role_get as $k => $v){
//            print_r($v);exit;
            $crm_role_get[$k]->role_time = date( 'Y-m-d H:i:s' , $v->role_time);
        }
//        exit;
//        print_r($crm_role_get->currentPage());exit;
        //页数
        $page = $crm_role_get->currentPage();

        //总条数
        $crm_role_count = $res = DB::table('crm_role') -> count();

        return view( "role/role_list" , [ 'crm_role_get' => $crm_role_get , 'crm_role_count' => $crm_role_count , 'page' => $page ] );
    }
    //角色添加   温静
    public function role_add( Request $request )
    {



        $account = $request->session()->get('account');
        $crm_admin_first = $res = DB::table('crm_admin') -> where( 'admin_id' , '=' , $account['admin_name'] ) -> first();
        $admin_name = $crm_admin_first->admin_name;

        return view("role/role_add" , [ 'admin_name' => $admin_name ]);
    }


    //角色添加
    public function role_add_do( Request $request ){

        $data = $request -> post();
//        echo 212121212;exit;
        $admin_session = admin_aession();
        if( empty( $data['username'] ) ){
            return[ 'msg'=> '角色名称不能为空' , 'code' => '2' ];
        }
        $crm_dep_first = $res = DB::table('crm_role') -> where( 'role_name' , '=' , $data['username'] ) -> first();

        if( !empty( $crm_dep_first ) ){
            return[ 'msg'=> '角色名称不能为空' , 'code' => '2' ];
        }

        $insert = [
            'role_name' => $data['username'],
            'role_time' => time(),
            'role_utime' => time(),
            'role_status' => 0,
            'admin_id' => $admin_session->admin_id,
        ];
        $crm_dep_insert = DB::table('crm_role') -> insert( $insert );
//        print_r($crm_dep_first);exit;
        if( !$crm_dep_insert ){
            return[ 'msg'=> '角色添加失败' , 'code' => '2' ];
        }


        return[ 'msg'=> '角色添加成功' , 'code' => '1' ];

    }


    //是否启用
    public function role_is( Request $request ){
        $status = $request -> get('status');
        $ids = $request -> get('ids');
        $page = $request -> get('page');
//        $data = $request -> get();
//        print_r($data);exit;
//        $is = '';
        if( empty( $status ) && empty( $ids ) ){
            return[ 'msg'=> '系统错误1' , 'code' => '2' ];
        }
        if( $status == 0 ){
            $is = 1;
        }
        if( $status == 1 ){
            $is = 0;
        }

        $update = [
            'role_status' => $is,
        ];
        $where = [
            'role_id' => $ids,
        ];
        $upde = DB::table('crm_role')
            ->where( $where )
            ->update( $update );
//        dd($upde);exit;


        if( !$upde ){
            return[ 'msg'=> '系统错误2' , 'code' => '2' ];
        }
//        if( $is == 1){
//            $data .= '<span class="layui-btn layui-btn-sm layui-btn-radius layui-btn-normal is" onclick="student_is( '.$ids.' , '.$is.' )" >已启用</span>';
////            return[ 'msg'=> '已启用' , 'code' => '1' , 'data' => $data , 'ids' => $ids];
//        }
//        if( $is == 0){
//            $data .= '<span class="layui-btn layui-btn-sm layui-btn-radius layui-btn-primary is" onclick="student_is( '.$ids.' , '.$is.' )" >未启用</span>';
////            return[ 'msg'=> '已禁用' , 'code' => '1' , 'data' => $data  , 'ids' => $ids ];
//        }

        ///替换整个数据foreach

        //查询所有数据

//        $crm_role_get = DB::table('crm_role')
//            -> join('crm_admin', 'crm_admin.admin_id', '=', 'crm_role.admin_id')
//            -> paginate( 2, 10 );
        //偏移量
        $limt = ( $page -1)*10;
//        print_r($page);exit;
        $crm_role_get =DB::table('crm_role') -> join('crm_admin', 'crm_admin.admin_id', '=', 'crm_role.admin_id') -> offset($limt)->limit(10)->get();
//        dd($crm_role_get);exit;
        $arr = '';
        $arrs = '';
        foreach( $crm_role_get as $k => $v ){
            if( $v->role_status == 1){
                $arrs = '<span class="layui-btn layui-btn-sm layui-btn-radius layui-btn-normal is" onclick="student_is( '.$v->role_id.' , '.$v->role_status.' , '. $page .' )" >已启用</span>';
//            return[ 'msg'=> '已启用' , 'code' => '1' , 'data' => $data , 'ids' => $ids];
            }
            if( $v->role_status == 0){
                $arrs = '<span class="layui-btn layui-btn-sm layui-btn-radius layui-btn-primary is" onclick="student_is( '.$v->role_id.' , '.$v->role_status.' , '. $page .' )" >未启用</span>';
//            return[ 'msg'=> '已禁用' , 'code' => '1' , 'data' => $data  , 'ids' => $ids ];
            }
            $arr .= '<tr>
                        <td>
                            <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id=\'2\'>
                            <i class="layui-icon">&#xe605;</i></div>
                        </td>
                        <td>'. $v->role_id .'</td>
                        <td>'. $v->role_name .'</td>
                        <td>'. date( 'Y-m-d H:i:s' , $v->role_time) .'</td>
                        <td>'. $v->admin_name .'</td>
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


    //添加角色权限
    public function limit_role(){
        //查询权限表的所有数据  启动的
        $admin =admin_aession();
//        print_r($admin);exit;

        $crm_lim_get = $res = DB::table('crm_lim') -> where( 'lim_status' , '=' , '1' ) -> get( ['lim_con' , 'lim_id'] );
        //查询所有角色
        $crm_role_get = $res = DB::table('crm_role') -> where( 'role_status' , '=' , '1' ) -> get( ['role_name' , 'role_id'] );
//        print_r($crm_role_get);exit;
        return view("role/limit_role" , [ 'admin_name' => $admin->admin_name , 'crm_lim_get' => $crm_lim_get , 'crm_role_get' => $crm_role_get ]);

    }




    //执行权限添加
    public function role_lim_do( Request $request ){

        //用户

        $admin_session =admin_aession();


        $data = $request -> post();
        if( empty( $data['role_id'] ) ){
            return[ 'msg'=> '角色不能为空' , 'code' => '2' ];
        }
        if( empty( $data['check_rule'] ) ){
            return[ 'msg'=> '权限不能为空' , 'code' => '2' ];
        }
        $data['check_rule'] = trim( $data['check_rule'], '');
        $data['check_rule'] = trim( $data['check_rule'], ',');
        $check_rule = explode( ',' , $data['check_rule'] );//in
//        print_r($check_rule);exit;

        $where = [
            'role_id' => $data['role_id'],
        ];
        //原来库里有的权限
        $role_lim_gets = $res = DB::table('role_lim') -> where($where) -> get()->toArray();
//        print_r($role_lim_gets);exit;
        if( !empty( $role_lim_gets ) ){
            $role_lim_delete = $res = DB::table('role_lim') -> where($where) -> delete();
            if( !$role_lim_delete ){

                return[ 'msg'=> '系统错误1' , 'code' => '2' ];
            }



        }

//        echo 12121212;exit;

        foreach( $check_rule as $k => $v ){
//            echo 121212;exit;
            $insert = [
                'role_id' => $data['role_id'],
                'lim_id' => $v,
                'role_lim_ctime' => time(),
                'rolr_lim_utime' => time(),
                'admin_id' => $admin_session->admin_id,
                'role_lim_status' => 1,
            ];
//            print_r($insert);
            $crm_dep_insert = DB::table('role_lim') -> insert( $insert );
            if( !$crm_dep_insert ){

                return[ 'msg'=> '系统错误2' , 'code' => '2' ];
            }
        }
        return[ 'msg'=> '保存成功' , 'code' => '1' ];
    }

    function role_deete(){

    }



}
