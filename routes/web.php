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


Route::get('admin/login', 'Admin\LoginController@login');
Route::get('admin/yzm', 'Admin\LoginController@yzm');
Route::post('admin/dologin', 'Admin\LoginController@dologin');

// 定义路由组
Route::group(['middleware'=>'islogin', 'prefix'=>'admin', 'namespace'=>'Admin'], function(){
	// 加入后台主页的路由
	Route::get('index', 'IndexController@index');
	Route::get('info', 'IndexController@info');
	// 退出登陆
	Route::get('logout', 'IndexController@logout');
	Route::get('welcome', 'IndexController@welcome');

	// 用户模块路由
	Route::resource('user', 'UserController');
});


