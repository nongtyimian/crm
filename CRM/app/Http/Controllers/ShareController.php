<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
class ShareController extends Controller
{
    //客户共享
    public function share_user(){
        $users=DB::table('csm_user')->paginate(3);
        return view("Share/share_user",['data'=>$users]);
    }
}
