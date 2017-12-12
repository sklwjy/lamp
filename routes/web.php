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

//注册模块,发送短信和邮件
Route::get('phoneregister','RegisterController@PhoneRegister');
Route::post('sendcode','RegisterController@sendCode');
Route::post('phoneregister','RegisterController@doPhoneRegister');

//使用邮箱注册的路由
Route::get('emailregister','RegisterController@EmailRegister');
Route::post('emailregister','RegisterController@doEmailRegister');
//邮件注册激活路由
Route::get('active','RegisterController@active');

//找回密码路由
Route::get('forget','RegisterController@forget');
Route::post('doforget','RegisterController@doforget');

//找回密码页面
Route::get('reset','RegisterController@reset');
//重置密码
Route::post('doreset','RegisterController@doreset');


Route::get('SendReminderEmail','RegisterController@SendReminderEmail');

//个人信息路由
Route::get('account','Home\AccountController@account');
Route::post('account','Home\AccountController@doaccount');

// 前台路由
	
	Route::get('home/login','Home\LoginController@login');
	Route::get('home/yzm', 'Home\LoginController@yzm');
	Route::get('home/sss', 'Home\LoginController@sss');
	Route::post('home/dologin', 'Home\LoginController@dologin');
	Route::get('home/register', 'Home\LoginController@register');
    Route::post('home/doregister', 'LoginController@doregister');

    Route::group(['middleware' => 'homeislogin', 'prefix'=>'home', 'namespace'=>'Home'], function(){
	Route::get('index', 'IndexController@index');

	Route::resource('message','MessageController');
});




// 后台路由
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

	// 新闻模块路由
	Route::resource('news', 'NewsController');
	// 新闻模块上传文件(图片)路由
	Route::post('upload', 'NewsController@upload');

// 网站配置模块路由
Route::resource('config', 'ConfigController');


    //    友情链接路由
    Route::resource('link','LinkController');
//    Route::post('link/sou','LinkController@index');


    // 角色模块路由
    Route::resource('role', 'RoleController');
    // 角色授权路由
    Route::get('role/auth/{id}','RoleController@auth');
    Route::post('role/doauth','RoleController@doauth');


    // 权限模块路由
    Route::resource('permission', 'PermissionController');


});
//修改密码路由
Route::get('admin/pass','Admin\PassController@test');
