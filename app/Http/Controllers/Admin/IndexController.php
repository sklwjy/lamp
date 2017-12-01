<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    // 后台主页
   	public function index()
   	{
   		return view('admin/index');
   	}

   	// 退出登陆
   	public function logout()
   	{
   		session()->flush();
   		return redirect('admin/login');
   	}

   	public function welcome()
   	{
   		return view('admin/welcome');
   	}
}
