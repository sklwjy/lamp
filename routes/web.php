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
Route::get('/', function(){
	return view('welcome');
});

Route::get('admin/login', 'Admin\LoginController@login');
Route::get('admin/yzm', 'Admin\LoginController@yzm');
Route::post('admin/dologin', 'Admin\LoginController@dologin');

Route::get('sss', 'Admin\LoginController@sss');

// 定义路由组
// Route::group(['middleware'=>'islogin', 'prefix'=>'admin', 'nameapace'=>'Admin'], function(){
	// 加入后台主页的路由
	Route::get('admin/index', 'Admin\IndexController@index');

// });
