<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Jobs\SendReminderEmail;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use App\Model\home\Users;

class ForgetController extends Controller
{
	// 找回密码页面
    public function forget()
    {
    	return view('home/forget/forget');
    }

    // 发送找回密码的邮件
    public function doforget(Request $request)
    {
    	// 要发送的邮箱
    	$email = $request['user_email'];
    	// dd($email);
    	
    	// 根据邮箱获取收件认得信息
    	$res = Users::where('user_email', $email)->first();
    	// dd($res);
    	
    	Mail::send('email.forget', ['user' => $res], function ($m) use ($res) {
    		$m->to($res->user_email,$res->user_name)->subject('微博找回密码!');
    	});

    	 return '修改密码邮件已经发送成功，请登录邮箱修改您的密码';
    }

    // 重置密码页面
    public function reset(Request $request)
    {
    	// 根据uid获取要修改密码的用户, 根据key确定链接的有效性
        $user = Users::find($request['uid']);
    	// $user = Users::find(1);

    	$user_name = $user->user_name;

    	if($request['key'] != $user->token){
    		return '无效的链接';
    	}

        // 如果有效, 就返回修改密码的界面
        return view('home/reset', compact('user_name'));
    }

    // 重置密码
    public function doreset(Request $request)
    {
        $input = $request->except('_token');
        //dd($input);

        // 找到要重置密码的用户
        $user = Users::where('user_email', $input['user_email'])->first();

        // dd($user);

        // 将用户的密码修改为传过来的密码
        $password  = Hash::make($request['user_pass']);
        // dd($password);
        $res = $user->update(['user_password'=>$password]);

        if($res){
            return redirect('home/login');
        }else{
            return "密码修改失败，请重新修改";
        }
    }
}
