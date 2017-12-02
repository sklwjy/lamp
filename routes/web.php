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







































// 前台路由
Route::get('home/login','Home\LoginController@login');

Route::post('home/dologin', 'Home\LoginController@dologin');

Route::get('home/index', 'Home\IndexController@index');
Route::get('home/register', 'Home\LoginController@register');
Route::post('home/doregister', 'Home\LoginController@doregister');

Route::get('yzm/', 'LoginController@yzm');