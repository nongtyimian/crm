<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    //登录页面 温静
    public function login( Request $request ){
    	// echo 1212121;exit;

		return view("Login/login");

    }

//构造方法    
    // public function __construct(){
    //     $this->middleware(function ($request, $next) {
    //         $user_data = $request->session() -> get('user_data');
    //         if(empty($user_data)) {
    //             redirect('/login')->send();
    //         }
    //         return $next($request);
    //     });
    // }


    //登录提交 温静
    public function login_do( Request $request ){
//        echo 1212121212;exit;
        //密码格式MD5 （ MD5 （密码）. MD5（盐））；
//        echo md5(md5('root').md5(123951));exit;
    	$data = $request -> post();

        if( empty( $data['account'] ) ){
            return [ 'msg' => '账号不能为空' , 'code' => '2' ];
        }
        if( empty( $data['pwsds'] ) ){
            return [ 'msg' => '密码不能为空' , 'code' => '2' ];
        }

        $crm_admin_get = $res = DB::table('crm_admin') -> where( 'admin_name' , '=' , $data['account'] ) -> first();

        if( empty( $crm_admin_get ) ){
            return[ 'msg'=> '账号或密码错误1' , 'code' => '2' ];
        }
        print_r($data->salt);exit;
        if( empty( $data->salt ) ){
            return[ 'msg'=> '账号或密码错误2' , 'code' => '2' ];
        }
        $pwd = md5( md5( $data['pwsds'] ).md5( $data['salt'] ) );

        if( $pwd != $crm_admin_get['pwd']){

            return[ 'msg'=> '账号或密码错误3' , 'code' => '2' ];
        }



//        $where = [
//            'crm_admin' => $data['account'],
//            'pwd' => md5( md5( $data['pwsds'] ).md5( $data['salt'] ) ) ,
//        ];
////        $pwd_get = $res = DB::table('crm_admin') -> where( $where ) -> first();
//        var_dump($pwd_get);exit;


        var_dump($crm_admin_get);exit;

    	print_r($data);exit;
    }

}
