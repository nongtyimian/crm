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
//        print_r($crm_admin_get->salt);exit;
        if( empty( $crm_admin_get->salt ) ){
            return[ 'msg'=> '账号或密码错误2' , 'code' => '2' ];
        }
        $pwd = md5( md5( $data['pwsds'] ).md5( $crm_admin_get->salt  ) );

        if( $pwd != $crm_admin_get->pwd){

            return[ 'msg'=> '账号或密码错误3' , 'code' => '2' ];
        }

        //session

        $session = [
            'admin_name'=>$data['account']
        ];
        session(['account' => $session]);

        return[ 'msg'=> '登录成功' , 'code' => '1' ];
    }


    //退出   温静
    public function logout( Request $request ){



        $request->session()->put('account');

        $null = session('account');

        if( empty( $null ) ){
            return redirect('/login');

        }
    }

}
