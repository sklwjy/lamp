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
	// 退出登陆
	Route::get('logout', 'IndexController@logout');
	Route::get('welcome', 'IndexController@welcome');

	// 用户模块路由
	Route::resource('user', 'UserController');
});


// 页面中引入页面路由
Route::get('admin/article-add', 'Admin\UserController@articleadd');
Route::get('admin/article-list', 'Admin\UserController@articlelist');
Route::get('admin/admin-role', 'Admin\UserController@adminrole');
Route::get('admin/product-brand', 'Admin\UserController@productbrand');
Route::get('admin/product-category', 'Admin\UserController@productcategory');
Route::get('admin/product-list', 'Admin\UserController@productlist');
Route::get('admin/product-category-add', 'Admin\UserController@productcategoryadd');