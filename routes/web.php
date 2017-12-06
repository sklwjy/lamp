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


// 前台路由
	
	Route::get('home/login','Home\LoginController@login');
	Route::get('home/yzm', 'Home\LoginController@yzm');
	Route::post('home/dologin', 'Home\LoginController@dologin');
	Route::get('home/register', 'Home\LoginController@register');
<<<<<<< HEAD
    Route::post('home/doregister', 'Home\LoginController@doregister');
    Route::group(['middleware'=>'homeislogin', 'prefix'=>'home', 'namespace'=>'Home'], function(){
	Route::get('index', 'IndexController@index');

=======
	Route::post('home/doregister', 'Home\LoginController@doregister');
Route::group(['middleware'=>'homeislogin', 'prefix'=>'home', 'namespace'=>'Home'], function(){
	Route::get('index', 'IndexController@index');
>>>>>>> origin/master
	Route::resource('message','MessageController');
});



// 后台无权限路由
Route::get('errors/auth', function(){
	return view('errors/auth');
});


// 后台路由
	Route::get('admin/login', 'Admin\LoginController@login');
	Route::get('admin/yzm', 'Admin\LoginController@yzm');
	Route::post('admin/dologin', 'Admin\LoginController@dologin');
// 退出登陆
	Route::get('admin/logout', 'Admin\IndexController@logout');
	Route::get('admin/welcome', 'Admin\IndexController@welcome');

// 定义路由组
Route::group(['middleware'=>'islogin', 'prefix'=>'admin', 'namespace'=>'Admin'], function(){
	// 加入后台主页的路由
	Route::get('index', 'IndexController@index');
	Route::get('info', 'IndexController@info');
	

	// 用户模块路由
	Route::resource('user', 'UserController');
	// 用户授权路由
	Route::get('user/auth/{id}','UserController@auth');
    Route::post('user/doauth','UserController@doauth');

	// 新闻模块路由
	Route::resource('news', 'NewsController');
	// 新闻模块上传文件(图片)路由
	Route::post('upload', 'NewsController@upload');

	// 网站配置模块路由
	Route::resource('config', 'ConfigController');

<<<<<<< HEAD


//    友情链接路由
    Route::resource('link','LinkController');


=======
	// 角色模块路由
	Route::resource('role', 'RoleController');
	// 角色授权路由
	Route::get('role/auth/{id}','RoleController@auth');
	Route::post('role/doauth','RoleController@doauth');


	// 权限模块路由
	Route::resource('permission', 'PermissionController');
>>>>>>> origin/master
});









