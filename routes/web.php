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

use Illuminate\Support\Facades\Hash;

// 前台路由
	
	// 前台登录路由
	Route::get('home/login','Home\LoginController@login');
	Route::post('home/dologin', 'Home\LoginController@dologin');
	Route::get('home/yzm', 'Home\LoginController@yzm');

	// 退出登陆路由
	Route::get('home/outlogin','Home\LoginController@outlogin');
	

	Route::get('home/sss', 'Home\LoginController@sss');
	

	// 前台注册路由
	Route::get('home/register', 'Home\LoginController@register');
    Route::post('home/doregister', 'Home\LoginController@doregister');

// 忘记密码路由
    //找回密码页面
	Route::get('home/forget', 'Home\ForgetController@forget');
	// 重置密码
	Route::post('home/doforget', 'Home\ForgetController@doforget');
	// 邮件的链接跳转路由
	Route::get('reset', 'Home\ForgetController@reset');
	Route::post('doreset', 'Home\ForgetController@doreset');

	// 前台主页面(未登录)
	Route::get('home/index', 'Home\IndexController@index');

    
Route::group(['middleware'=>'homeislogin', 'prefix'=>'home', 'namespace'=>'Home'], function(){

	
	// 主页信息页面
	Route::resource('message','MessageController');
	

	// 微博详情页面
	Route::get('info','MessageController@info');

	

});




// 后台路由

// 登录路由
Route::get('admin/login', 'Admin\LoginController@login');
Route::post('admin/dologin', 'Admin\LoginController@dologin');

// 验证码路由
Route::get('admin/yzm', 'Admin\LoginController@yzm');

// 提示没有权限路由
Route::get('errors/auth',function(){
    return view('errors.auth');
});


// 定义路由组
Route::group(['middleware'=>['islogin', 'hasrole'], 'prefix'=>'admin', 'namespace'=>'Admin'], function(){
	// 加入后台主页的路由
	Route::get('index', 'IndexController@index');
	Route::get('info', 'IndexController@info');


	// 退出登陆
	Route::get('logout', 'IndexController@logout');
	Route::get('welcome', 'IndexController@welcome');
	// 修改密码路由
	Route::get('change', 'IndexController@change');
	Route::post('dochange', 'IndexController@dochange');


	// 用户模块路由
	Route::resource('user', 'UserController');
	// 用户授权路由
	Route::get('user/auth/{id}', 'UserController@auth');
	Route::post('user/doauth', 'UserController@doauth');


	// 新闻模块路由
	Route::resource('news', 'NewsController');
	// 新闻模块上传文件(图片)路由
	Route::post('upload', 'NewsController@upload');


	// 网站配置模块路由
	Route::resource('config', 'ConfigController');
	// 批量修改配置路由
    Route::post('config/contentchange','ConfigController@ContentChange');
    // 同步网站配置内容到webconfig 文件中
    Route::get( 'deploy','ConfigController@PutFile');


    //    友情链接路由
    Route::resource('link','LinkController');


    // 角色模块路由
    Route::resource('role', 'RoleController');
    // 角色授权路由
    Route::get('role/auth/{id}','RoleController@auth');
    Route::post('role/doauth','RoleController@doauth');


    // 权限模块路由
    Route::resource('permission', 'PermissionController');

});


Route::get('sss', function(){
	$res = Hash::check('$2y$10$l2m1yCWB81Z.T1WbbySILuhqbtjonI7dJsCUq2RIHIQEJK1ZxCkVu');
});