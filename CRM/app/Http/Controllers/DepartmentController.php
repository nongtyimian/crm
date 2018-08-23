<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    //部门展示   温静
    public function department( Request $request )
    {

        return view("department/department");
    }
}
