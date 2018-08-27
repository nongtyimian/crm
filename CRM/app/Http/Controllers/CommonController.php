<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommonController extends Controller
{

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $user_data = $request->session()->get('account');
            if (empty($user_data)) {
                redirect('/login')->send();
            }
            return $next($request);
        });
    }

    //公共文件 获取session
//    function admin_session( $request,$next)
//    {
//        $account = $request->session()->get('account');
//        print_r($account);exit;
//        $crm_admin_first = $res = DB::table('crm_admin')->where('admin_id', '=', $account['admin_name'])->first();
//        return $next($request);
//    }



//    //公共文件 获取session
//    function admin_session( Request $request)
//    {
//        $account = $request->session()->get('account');
//        $crm_admin_first = $res = DB::table('crm_admin')->where('admin_id', '=', $account['admin_name'])->first();
//        return $crm_admin_first;
//    }

}
