<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Crypt;
use App\Model\admin\User;
use App\Http\Requests;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

require_once app_path().'\Org\code\Code.class.php';
use App\Org\code\Code;


use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;

class LoginController extends Controller
{
    /**
     * 后台登录页面
     * @author 尚凯龙
     * @date_ 2017-11-29 00:02
     * @return view
     */
    
    public function login()
    {
    	// return app_path();
    	return view('admin.login');
    }

    // public function yzm()
    // {
    // 	$code = new Code();
    // 	$code->make();
    // }

     // 验证码生成
    public function yzm()
    {
        $phrase = new PhraseBuilder;
        // 设置验证码位数
        $code = $phrase->build(4);
        // 生成验证码图片的Builder对象，配置相应属性
        $builder = new CaptchaBuilder($code, $phrase);
        // 设置背景颜色
        $builder->setBackgroundColor(220, 210, 230);
        $builder->setMaxAngle(25);
        $builder->setMaxBehindLines(0);
        $builder->setMaxFrontLines(0);
        // 可以设置图片宽高及字体
        $builder->build($width = 100, $height = 40, $font = null);
        // 获取验证码的内容
        $phrase = $builder->getPhrase();
        // 把内容存入session
        \Session::put('code', $phrase);
        // 生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header("Content-Type:image/jpeg");
        $builder->output();
    }

    public function dologin(Request $request)
    {
    	// dd(11);
    	$input = $request->except('_token');
    	 //dd($input);

    	// 对数据进行后台表单验证
    	// Validator::make(要验证的数据,验证规则,提示信息);
    	
    	// 验证规则
    	$rule = [
    		'admin_name'=>'required|between:5,20',
    		'admin_pass'=>'required|between:5,20',
    	];

    	// 提示信息
    	$mess = [
    		'admin_name.required'=>'用户名必须填写',
    		'admin_name.between'=>'用户名必须在5到20位之间',
    		'admin_pass.required'=>'密码必须输入',
    		'admin_pass.between'=>'密码必须在5到20位之间'
    	];

    	// $validator =  Validator::make($input,$rule,$mess);
    	// // 如果表单验证失败 passes()
    	// if ($validator->fails()) {
     //          return redirect('admin/login')
     //              ->withErrors($validator)
     //              ->withInput();
     //      }

    	 $validator =  Validator::make($input,$rule,$mess);
        //如果表单验证失败 passes()
          if ($validator->fails()) {
              return redirect('admin/login')
                  ->withErrors($validator)
                  ->withInput();
          }
      
        // 3 登录逻辑
        // 3.0 验证验证码是否正确
        if($input['code'] != \Session::get('code')) {
        	return redirect('admin/login')->with('errors', '验证码错误');
        }

        //3.1 判断是否有此用户
       	 $user = User::where('admin_name',  $input['admin_name'])->first();
       	// dd($user);
       	 if(!$user){
       	 	return redirect('admin/login')->with('errors', '用户名不存在');
       	 }
        
       	 // 3.2 密码是否正确
       	 // $user->admin_pass   $input['admin_pass']
       	if( Crypt::decrypt($user->admin_pass) != trim($input['admin_pass'])){
       		return redirect('admin/login')->with('errors', '密码不正确');
       	}

       	//4 登陆成功, 将用户信息保存到session中, 用于判断用户是否登录以及获取用户信息
       	Session::put('user', $user);
       	return redirect('admin/index');

       	// 5 登录失败, 返回登陆页面

    }

	public function sss()
	{
		$str = '123456';

		$c = Crypt::encrypt($str);
		return $c;
	}
}
