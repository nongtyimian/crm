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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home',"IndexController@index");
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
//
