<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class OffController extends CommonController
{
    //公文展示
    public function off_list( Request $request ){
        //查询所有数据
        $crm_off_get = DB::table('crm_off')
            -> join('crm_admin', 'crm_admin.admin_id', '=', 'crm_off.admin_id')
            -> paginate(5);
//        var_dump($crm_role_get);exit;
        foreach( $crm_off_get as $k => $v){
//            print_r($v);exit;
            $crm_off_get[$k]->off_ctime = date( 'Y-m-d H:i:s' , $v->off_ctime );
            $crm_off_get[$k]->off_content =  htmlspecialchars_decode( $v->off_content );
//            print_r($crm_off_get[$k]->off_content);
        }
//        exit;
        //页数
        $page = $crm_off_get->currentPage();

        //总条数
        $crm_off_count = $res = DB::table('crm_off') -> count();

        return view( "off/off_list" , [ 'crm_off_get' => $crm_off_get , 'crm_off_count' => $crm_off_count , 'page' => $page ] );


    }

    //公文添加
    public function off_add( Request $request ){
        $admin_session = admin_aession();
        return view( "off/off_add" , [ 'admin_session' => $admin_session->admin_name] );

    }

    //添加
    public function off_add_do( Request $request ){
        $data = $request->post();
//        print_r($data);exit;

        $admin_session = admin_aession();
        if( empty( $data['title'] ) ){
            return[ 'msg'=> '标题不能为空' , 'code' => '2' ];
        }
        if( empty( $data['product_desc'] ) ){
            return[ 'msg'=> '公文内容不能为空' , 'code' => '2' ];
        }


        $insert = [
            'off_tittle' => $data['title'],
            'off_content' => htmlspecialchars( $data['product_desc'] ),
            'off_ctime' => time(),
            'off_utime' => time(),
            'off_status' => 0,
            'admin_id' => $admin_session->admin_id,
        ];
        $crm_lim_insert = DB::table('crm_off') -> insert( $insert );
//        print_r($crm_dep_first);exit;
        if( !$crm_lim_insert ){
            return[ 'msg'=> '公文添加失败' , 'code' => '2' ];
        }


        return[ 'msg'=> '公文添加成功' , 'code' => '1' ];








        return view( "off/off_add" , [ 'admin_session' => $admin_session->admin_name] );

    }
    //图片
    public function off_url( Request $request ){

        if ($request->isMethod('POST')) {

            $fileCharater = $request->file('file');

            if ($request->hasFile('file') && $request->file('file')->isValid()) {
                //获取文件的扩展名
                $ext = $fileCharater->getClientOriginalExtension();

                //获取文件的绝对路径
                $path = $fileCharater->getRealPath();
                //定义文件名
                $filename = date('Y-m-d-h-i-s').'.'.$ext;
//                print_r($filename);exit;

                //存储文件。disk里面的public。总的来说，就是调用disk模块里的public配置
                $path = $request->file('file')->storeAs( 'images' , $filename );
//                print_r($path);exit;

            }
            return [ 'code' => 0 , 'msg' => '上传成功' , 'data' => [ 'src' => '/uplodes/'.$path  ] ];

        }


    }



    //权限启用
    public function off_is( Request $request ){
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
            'off_status' => $is,
        ];
        $where = [
            'off_id' => $ids,
        ];
        $upde = DB::table('crm_off')
            ->where( $where )
            ->update( $update );
//        dd($upde);exit;


        if( !$upde ){
            return[ 'msg'=> '系统错误2' , 'code' => '2' ];
        }
        //偏移量
        $limt = ( $page -1)*10;
//        print_r($page);exit;
        $crm_role_get =DB::table('crm_off') -> join('crm_admin', 'crm_admin.admin_id', '=', 'crm_off.admin_id')
            -> offset($limt)->limit(5)->get();
//        dd($crm_role_get);exit;
        $arr = '';
        $arrs = '';
        foreach( $crm_role_get as $k => $v ){
            if( $v->off_status == 1){
                $arrs = '<span class="layui-btn layui-btn-sm layui-btn-radius layui-btn-normal is" onclick="student_is( '.$v->off_id.' , '.$v->off_status.' , '. $page .' )" >已启用</span>';
//            return[ 'msg'=> '已启用' , 'code' => '1' , 'data' => $data , 'ids' => $ids];
            }
            if( $v->off_status == 0){
                $arrs = '<span class="layui-btn layui-btn-sm layui-btn-radius layui-btn-primary is" onclick="student_is( '.$v->off_id.' , '.$v->off_status.' , '. $page .' )" >未启用</span>';
//            return[ 'msg'=> '已禁用' , 'code' => '1' , 'data' => $data  , 'ids' => $ids ];
            }
            $arr .= '<tr>
                        <td>
                            <div class="layui-unselect layui-form-checkbox" lay-skin="primary" data-id=\'2\'>
                            <i class="layui-icon">&#xe605;</i></div>
                        </td>
                        <td>'. $v->off_id .'</td>
                        <td>'. $v->off_tittle .'</td>
                        <td>'. htmlspecialchars_decode( $v->off_content ) .'</td>
                        <td>'. date( 'Y-m-d H:i:s' , $v->off_ctime) .'</td>
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


}
