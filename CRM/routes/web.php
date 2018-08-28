<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/layout', function () {
    return view('index/layout');
});
Route::get('/',"IndexController@index");
Route::get('/test',"IndexController@test");//



//设置权限   角色权限
Route::any('/limit_role',"RoleController@limit_role");//
//执行角色权限添加
Route::any('/role_lim_do',"RoleController@role_lim_do");//

//角色列表
Route::any('/role_list',"RoleController@role_list");
//角色添加页面
Route::any('/role_add',"RoleController@role_add");
//执行添加角色操作
Route::any('/role_add_do',"RoleController@role_add_do");
//角色修改页面
Route::any('/role_modify',"RoleController@role_modify");
//执行修改角色操作
Route::any('/role_modify_do',"RoleController@role_modify_do");
//角色删除
Route::any('/role_delete',"RoleController@role_delete");
//角色是否启用
Route::any('/role_is',"RoleController@role_is");




//departmentController   温静
//部门添加de
Route::any('/department',"DepartmentController@department");
//部门添加执行
Route::any('/department_add',"DepartmentController@department_add");
//部门展d示
Route::any('/department_list',"DepartmentController@department_list");
//部门修改页面
Route::any('/department_update',"DepartmentController@department_update");
//部门修改执行
Route::any('/department_update_add',"DepartmentController@department_update_add");
//部门删除
Route::any('/department_delect',"DepartmentController@department_delect");

//员工
//管理员添加  accountController   温静
Route::any('/account',"AccountController@account");
//管理员添加执行
Route::any('/account_add',"AccountController@account_add");
//管理员展示
Route::any('/account_list',"AccountController@account_list");
//管理员修改
Route::any('/account_update',"AccountController@account_update");
//管理员修改执行
Route::any('/account_update_add',"AccountController@account_update_add");
//管理员删除
Route::any('/account_delect',"AccountController@account_delect");




//权限列表
Route::any('/limit_list',"LimitController@limit_list");
//添加权限列表
Route::any('/limit_add',"LimitController@limit_add");
//执行添加权限操作
Route::any('/limit_add_do',"LimitController@limit_add_do");
//修改权限页面
Route::any('/limit_modify',"LimitController@limit_modify");
//执行修改权限操作
Route::any('/limit_modify_do',"LimitController@limit_modify_do");
//删除权限
Route::any('/limit_delete',"LimitController@limit_delete");
//是否启用
Route::any('/limit_is',"LimitController@limit_is");

//登录—页面
Route::any('/login',"AdminController@login");
//执行登录页面
Route::any('/login_do',"AdminController@login_do");
//退出
Route::any('/logout',"AdminController@logout");

//客户列表
Route::any('/user_list',"UserController@user_list");
//客户详情
Route::any('/user_view',"UserController@user_view");
//添加客户页面
Route::any('/user_add',"UserController@user_add");
//执行添加客户操作
Route::any('/user_add_do',"UserController@user_add_do");
Route::any('/user_add_doadd',"UserController@user_add_doadd");
Route::any('/user_add_sel',"UserController@user_add_sel");
//编辑客户页面
Route::any('/user_modify',"UserController@user_modify");
//执行编辑客户操作
Route::any('/user_modify_do',"UserController@user_modify_do");
//删除客户
Route::any('/user_delete',"UserController@user_delete");

//跟单记录
Route::any('/documentary_list',"DocumentaryController@documentary_list");
//新增跟单记录页面
Route::any('/documentary_add',"DocumentaryController@documentary_add");
//执行新增跟单记录
Route::any('/documentary_add_do',"DocumentaryController@documentary_add_do");
//执行跟单删除
Route::any('/documentary_del',"DocumentaryController@documentary_del");


//跟单类型列表
Route::any('/dtype_list',"DtypeController@dtype_list");
//跟单类型添加页面
Route::any('/dtype_add',"DtypeController@dtype_add");
//执行添加跟单类型
Route::any('/dtype_add_do',"DtypeController@dtype_add_do");

//进度列表
Route::any('/schedule_list',"ScheduleController@schedule_list");
//添加进度页面
Route::any('/schedule_add',"ScheduleController@schedule_add");
//执行添加进度
Route::any('/schedule_add_do',"ScheduleController@schedule_add_do");

//合同记录
Route::any('/contract_list',"ContractController@contract_list");
//创建合同页面
Route::any('/contract_add',"ContractController@contract_add");
//执行创建合同操作
Route::any('/contract_add_do',"ContractController@contract_add_do");
Route::any('/contract_del',"ContractController@contract_del");

//订单记录
Route::any('/order_list',"OrderController@order_list");
//创建订单
Route::any('/create_order',"OrderController@create_order");
//订单详情
Route::any('/order_view',"OrderController@order_view");
//修改订单页面
Route::any('/order_modify',"OrderController@order_modify");
//执行修改订单操作
Route::any('/order_modify_do',"OrderController@order_modify_do");
//删除订单
Route::any('/order_delete',"OrderController@order_delete");

//统计列表
Route::any('/statistics_list',"StatisticsController@statistics_list");
//搜索数据
Route::any('/statistics_search',"StatisticsController@statistics_search");

//共享客户页面
Route::any('/share_user',"ShareController@share_user");
//执行共享客户操作
Route::any('/share_user_do',"ShareController@share_user_do");
Route::any('/share_add_doadd',"ShareController@share_add_doadd");


//查询用户	swz
Route::any("/sele_user","OrderController@sele_user");


//查询shangpin
Route::any("/sele_goods","OrderController@sele_goods");

//展示内部公文
Route::any("/offic","FunctionController@zhanshi");
//添加内部公文
Route::any("/offadd","FunctionController@add");
Route::any("/offadddo","FunctionController@adddo");
//删除公文
Route::any("/offdel","FunctionController@del");
//修改公文
Route::any("/offup","FunctionController@up");
Route::any("/offupdo","FunctionController@updo");



//展示产品
Route::any("/prob_list","ProbController@zhanshi");

//添加产品
Route::any("/probadd","ProbController@add");
Route::any("/probadddo","ProbController@adddo");
//删除产品
Route::any("/probdel","ProbController@del");
//修改产品
Route::any("/probup","ProbController@up");
Route::any("/probupdo","ProbController@updo");

//查询shangpin swz
Route::any("/sele_goods","OrderController@sele_goods");

//操作记录
Route::any('/ope_list',"StatisticsController@ope_list");

//客户相关
Route::any('/customer_type',"UserController@customer_type");
Route::any('/customer_level',"UserController@customer_level");
Route::any('/customer_source',"UserController@customer_source");
Route::any('/customer_add',"UserController@customer_add");
Route::any('/customer_add_do',"UserController@customer_add_do");
#删除
Route::any('/user_del',"UserController@user_del");

#等级
Route::any('/customer_level_add',"UserController@customer_level_add");
Route::any('/customer_level_do',"UserController@customer_level_do");
Route::any('/customer_source_add',"UserController@customer_source_add");
Route::any('/customer_source_do',"UserController@customer_source_do");
Route::any('/customer_type_del',"UserController@customer_type_del");
Route::any('/customer_del',"UserController@customer_del");
Route::any('/customer_level_del',"UserController@customer_level_del");
Route::any('/customer_source_del',"UserController@customer_source_del");



//登录日志
Route::any('/Logon_log',"UserController@Logon_log");


//个人日历
Route::any('/pers',"IndexController@pers");
Route::any('/per_list',"IndexController@per_list");
//个人日历添加日期
Route::any('/dateadd',"IndexController@per_add");

//修改跟单记录
Route::any('/dtype_update',"DocumentaryController@dtype_update");

//修改跟单执行
Route::any('/documentary_update_do',"DocumentaryController@documentary_update_do");

//跟单提醒
Route::any('/remind',"DocumentaryController@remind");







