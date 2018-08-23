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
Route::get('/test',"IndexController@test");
//角色列表
Route::any('/role_list',"RoleController@role-list");
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
//设置权限
Route::any('/limit_delete',"RoleController@limit_delete");

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