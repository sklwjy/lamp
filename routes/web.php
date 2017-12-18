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

	//注册模块,发送短信和邮件
	Route::get('phoneregister','RegisterController@PhoneRegister');
	Route::post('sendcode','RegisterController@sendCode');
	Route::post('phoneregister','RegisterController@doPhoneRegister');

	//使用邮箱注册的路由
	Route::get('emailregister','RegisterController@EmailRegister')->middleware('login');
	Route::post('emailregister','RegisterController@doEmailRegister');
	//邮件注册激活路由
	Route::get('active','RegisterController@active');



	//个人信息路由
	Route::get('account','Home\AccountController@account');
	Route::post('account','Home\AccountController@doaccount');

	// 退出登陆路由
	Route::get('home/outlogin','RegisterController@outlogin');
	


	// 前台登录路由

//	Route::get('home/login','Home\LoginController@login');
//	Route::post('home/dologin', 'Home\LoginController@dologin');
	Route::get('home/yzm', 'Home\LoginController@yzm');

	// Route::get('home/login','Home\LoginController@login');
	// Route::post('home/dologin', 'Home\LoginController@dologin');
	// Route::get('home/yzm', 'Home\LoginController@yzm');






	// 前台注册路由
	Route::get('home/register', 'Home\LoginController@register');
    Route::post('home/doregister', 'LoginController@doregister');
    Route::post('home/doregister', 'Home\LoginController@doregister');

Route::post('home/asount','AccountController@update');


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
	Route::get('home/list', 'Home\IndexController@list');
	Route::get('home/info', 'Home\IndexController@info');


	// 瀑布流效果
	Route::post('home/pbl', 'Home\IndexController@pbl');
	// 新闻收藏
	// Route::get('home/shou', 'Home\IndexController@shou');


	// 个人信息
    Route::get('home/account','Home\AccountController@edit');
    Route::post('home/account','Home\AccountController@update');
    Route::post('home/file','Home\AccountController@file');
    Route::post('home/accounts','Home\AccountController@accounts');


// 路由组 
Route::group(['middleware'=>'homeislogin', 'prefix'=>'home', 'namespace'=>'Home'], function(){
	// 修改密码
	Route::get('message/password', 'MessageController@password');
	
	// 主页信息页面
	Route::resource('message','MessageController');
	Route::post('upl','MessageController@upl');

	// 新闻收藏
	Route::get('shou/{id}','IndexController@shou');


    // 主页信息页面
   	Route::resource('message', 'MessageController');

        // 微博详情页面
        // Route::get('info', 'MessageController@info');


});

    //个人信息关注路由
   //关注我的
    // Route::get('home/friend','Home\FriendController@test');


    // //我的关注
    // Route::get('home/focusonyou','Home\friendController@test1');
    
    










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

	// 用户模块路由
	Route::resource('user', 'UserController');

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

            //广告模块
            Route::resource('advertising','AdvertisingController');
            Route::post('upload','AdvertisingController@upload');



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


