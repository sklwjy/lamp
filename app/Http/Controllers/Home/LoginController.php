<?php

namespace App\Http\Controllers\Home;

//use Illuminate\Http\Request;
//use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Crypt;
use App\Model\home\Users;
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
    public function login()
    {
        
        // return app_path();
        return view('home.login');
    }

    public function dologin(Request $request)
    {

        $input = $request->except('_token');
        //dd($input);

        // 验证规则
        $rule = [
            'user_email' => 'email',
            'user_password' => 'required|between:5,20',

//            'user_phone' => 'required|size:11',
        ];

        // 提示信息
        $mess = [
               'user_email.email' => '邮箱格式不正确',
                'user_password.required' => '密码必须输入',
                'user_password.between' => '密码必须在5到20位之间',
               'user_phone.required' => '手机号不能为空',
                'user_phone.size' => '手机号长度不合适',
            ];


            $validator = Validator::make($input, $rule, $mess);
            //如果表单验证失败 passes()
            if ($validator->fails()) {
                return redirect('home/login')
                    ->withErrors($validator)
                    ->withInput();
        }
        // 3 登录逻辑

        //3.1 判断是否有此用户

        if($input['user_email']){
            $user = Users::where('user_email', $input['user_email'] )->first();
        }

//         dd($user);
        if(!$user){
            return redirect('home/login')->with('errors', '用户名不存在');
        }

        // 3.2 密码是否正确
        // $user->admin_pass   $input['admin_pass']
        if( Crypt::decrypt($user->user_password) != trim($input['user_password'])){
            return redirect('home/login')->with('errors', '密码不正确');
        }

        //4 登陆成功, 将用户信息保存到session中, 用于判断用户是否登录以及获取用户信息
        Session::put('user', $user);
        return redirect('home/index');

    }


    public function sss()
    {
        $str = '123456';

        $c = Crypt::encrypt($str);
        return $c;
    }




  ///微博注册

    public function register()
    {
////        return 11;
            return view('home/register');

    }

//     public function yzm()
//     {
//     	$code = new Code();
//     	$code->make();
//     }

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
        \Session::flash('code', $phrase);
        // 生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header("Content-Type:image/jpeg");
        $builder->output();
    }

    public function doregister(Request $request)
    {
       // return 11;
        $input = $request->except('_token');
        //dd($input);

        // 验证规则
        $rule = [
            'user_name' => 'required|min:6|max:18',
            'user_email' =>  'email',
            'user_phone' => 'required|size:11',
            'user_password' => 'required|between:5,20',
            'user_rpassword' => 'same:user_rpassword',

        ];

        // 提示信息
        $mess = [
            'user_name.required' => '用户名不能为空',
            'user_name.required' => '用户名必须在6到18位之间',
            'user_password.required' => '密码必须输入',
            'user_password.between' => '密码必须在5到20位之间',
            'user_rpassword.same' => '确认密码不一致',
            'user_email.email' => '邮箱格式不正确',
            'user_phone.required' => '手机号不能为空',
            'user_phone.size' => '手机号长度不合适',
        ];


        $validator = Validator::make($input, $rule, $mess);
        //如果表单验证失败 passes()
        if ($validator->fails()) {
            return redirect('home/register')
                ->withErrors($validator)
                ->withInput();
        }

        if($input['code'] != \Session::get('code')) {
            return redirect('home/register')->with('errors', '验证码错误');
        }
//        dd($input);
//        $input = $request->except('code');
//         $res =   Users::create($input);
//        dd($res);
        $data = [
            'user_name'=>$input['user_name'],
            'user_time'=>time(),
            'user_phone' =>$input['user_phone'],
            'user_password' =>$input['user_password'],
            'user_status' =>0,
            'user_email' =>$input['user_email'],


            ];
           $res =   Users::create($data);
       // dd($res);
        return redirect('home/login');

    }

}
