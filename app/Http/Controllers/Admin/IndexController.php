<?php

namespace App\Http\Controllers\Admin;

use App\Model\admin\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;

class IndexController extends Controller
{
    // 后台主页
   	public function index()
   	{
   		return view('admin/index1');
   	}

      public function info()
      {
         return view('admin/info');
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

      // 修改密码
      public function change()
      {
         $admin = session::get('user');
         return view('admin/change-password', compact('admin'));
      }

      public function dochange(Request $request)
      {
         // 接受表单传过来的值
         $input = $request->except('_token');
         // dd($input);
         
         // 给密码加密
          $admin_password = Crypt::encrypt($input['admin_pass']);

          // 通过session中的找到要修改密码的用户
          $admin_pass = session::get('user.admin_pass');
          $admin = User::where('admin_pass', $admin_pass)->first();
          // dd($admin_pass);

          $res = $admin->update(['admin_pass'=>$admin_password]);
          
         if($res){
            return redirect('admin/index');
         }else{
            return "密码修改失败，请重新修改";
         }

      }
}
