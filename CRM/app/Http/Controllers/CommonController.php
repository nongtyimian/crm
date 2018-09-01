<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;



class CommonController extends Controller
{

    public function __construct()
    {
        $this->middleware(function ($request, $next) {


			
            //获取路由
            $r_url = $_SERVER['REQUEST_URI'];


            $num = strpos($r_url,"?");

//            print_r($num);
            $url = $r_url;
            if($num){
                $url = substr($r_url,0,$num);
            }

            $login = [ '/' , '/login' , '/login_do' , '/logout' , '/layout' ];
            $isin = in_array( $url , $login );


            if( empty($isin) ){

                $user_data = $request->session()->get('account');//用户id
                if (empty($user_data)) {
                    redirect('/login')->send();
                }

//                print_r($user_data);exit;
//                $uid = $user_data;
                $where = [
                    'crm_admin.admin_id' => $user_data
                ];
                $data = Db::table('crm_role')
                    -> join('crm_admin','crm_admin.role','=','crm_role.role_id')
                    -> where( $where)
                    -> first();


//                print_r($data);exit;
                if( $data -> role_id != 1 &&  $data ){

                    //查派生表
                    $where = [
                        'role_lim.role_id' => $data -> role_id,
                    ];
                    $lims = Db::table('role_lim')
                        -> join('crm_lim','crm_lim.lim_id','=','role_lim.lim_id')
                        -> where( $where)
                        -> get();
                    foreach( $lims as $k => $v ){
                        $login[] = $v ->lim_web;
                    }
                    if(!in_array($url,$login)){

//                        print_r($url);exit;
                        $where = [
                            'lim_web' => $url,
                        ];
                        $limss = Db::table('crm_lim') -> where( $where) -> first();
                        if( empty( $limss ) ){

                            exit('没有执行权限');
                        }else{

                            exit('没有'.$limss->lim_con.'的权限');
                        }

//                        print_r($limss);exit;
                    }
                }

            }


//
//            $user_data = $request->session()->get('account');
//            if (empty($user_data)) {
//                redirect('/login')->send();
//            }
            return $next($request);
        });
    }

}
