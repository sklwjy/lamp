<?php

namespace App\Http\Controllers;
use App\Model\admin\User;
use App\Model\home\Users;
use App\Jobs\SendReminderEmail;
//use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\SMS\SendTemplateSMS;
use App\SMS\M3Result;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Crypt;
use Session;
class RegisterController extends Controller
{
    /**
     * 手机注册页面
     */
    public function PhonueRegister()
    {
//        dd(111);
        return view('home.phoneregister');
    }

    /**
     * 发送短信验证码的方法
     */
    public function sendCode(Request $request)
    {
        $input = $request->except('_token');
//        return $input;

        $tempSms = new SendTemplateSMS();

//    * @param to 手机号码集合,用英文逗号分开
//    * @param datas 内容数据 格式为数组 第一个元素是一个随机数，表示验证码；第二个参数是验证码的有效时间 如5分钟
//    * @param $tempId 模板Id

//        参数1 手机号
        $phone = $input['phone'];

//        参数2
        $r = mt_rand(1000, 9999);
        $arr = [$r, 5];

        $M3Result = new M3Result();
        $M3Result = $tempSms->sendTemplateSMS($phone, $arr, 1);
        //发送验证码成功后，将验证码存入session中
        //session('phone', $r);
        session()->put('phone', $r);

        return $M3Result->toJson();
    }


    /**
     * 邮箱注册用户
     *
     */


    public function PhoneRegister()
    {
        // dd(111);
        return view('home.phoneregister');
    }

    public function doPhoneRegister(Request $request)
    {
        //  dd(session('phone'));
        //  //接收客户端传过来的注册数据
        $input = $request->except('_token');
//         dd($input);
//         验证规则
        $rule = [
            // 'user_phone' => 'required|min:6|max:18',
            'user_email' => 'email',
            'user_phone' => 'required|size:11',
            'user_password' => 'required|between:5,20',
            // 'user_rpassword' => 'same:user_rpassword',

        ];

        // 提示信息
        $mess = [
            // 'user_name.required' => '用户名不能为空',
            //'user_name.required' => '用户名必须在6到18位之间',
            'user_password.required' => '密码必须输入',
            'user_password.between' => '密码必须在5到20位之间',
            // 'user_rpassword.same' => '确认密码不一致',
            'user_email.email' => '邮箱格式不正确',
            'user_phone.required' => '手机号不能为空',
            'user_phone.size' => '手机号长度不合适',
        ];


        $validator = Validator::make($input, $rule, $mess);
        //如果表单验证失败 passes()
        if ($validator->fails()) {
            return redirect('phoneregister')
                ->withErrors($validator)
                ->withInput();
        }
//        $a = session('phone');
//        dd($a);
        if($input['code'] != session('phone')){
            return redirect('phoneregister')->with('errors', '验证码错误');
        }

//        unset(session('phone'));
//        if($input['code'] != Session::get('phone')) {
//            return redirect('phoneregister')->with('errors', '验证码错误');
//        }
        // dd($input);
        $input = $request->except('code');
//         $res =   Users::create($input);
//        dd($res);
        $data = [
            //'user_name'=>$input['user_name'],
            'user_time' => time(),
            'user_phone' => $input['user_phone'],
            'user_password' => Hash::make($input['user_password']),
            'user_status' => 0,
            'user_email' => $input['user_email'],
            'is_active' => 0,
            'token' => Hash::make($input['user_password']),
        ];

        //dd($data);


//        dd($input);

        // dd($input);
        //添加成功后，返回刚才添加的那条用户记录
        $res = Users::create($data);
        // dd($res);
        if ($res) {

//        4. 给注册邮箱发送注册邮件

//        参数一： 对方收到的邮件模板
//        参数二：邮件模板中需要的变量
//        参数三：关于邮件注册的变量，如发件人，主题、收件人等信息
            Mail::send('email.active', ['user' => $res], function ($m) use ($res) {
                //$m->from('hello@app.com', 'Your Application');

                $m->to($res->user_email, $res->user_name)->subject('微博邮箱激活!');
            });


            return redirect('emailregister')->with('msg', '注册成功,请到邮箱激活!!!');

        } else {
            return back();
        }

    }

    /**
     * 邮箱激活方法
     */

    public function active(Request $request)
    {
        //dd($request);
//        就是找到要激活的用户，将这条记录的is_active字段的值改成1


//        1. 先找到要激活的用户

        $user = Users::find($request['uid']);
        //dd($user);

//        1. 验证激活链接的有效性
        if ($request['key'] != $user->token) {
            return "无效的激活链接";
        }

        $res = $user->update(['is_active' => 1]);

        if ($res) {
            return redirect('emailregister');
        } else {
            return "激活失败，请重新注册";
        }

    }







    /**
     * 邮箱手机登录用户
     *
     */
    public function EmailRegister()
    {
//        dd(111);
        return view('home/emailregister');
    }


    public function doEmailRegister(Request $request)
    {
//       return 111;
        //接收客户端传过来的注册数据
        $input = $request->except('_token');
//         dd($input);

        $str = $input['user_email'];

        //dd($str);
//        $str = serialize($str);

        if(preg_match_all('/^((13[0-9])|(15[^4,\\D])|(18[0,0-9])|(17[0,0-9]))\\d{8}$/', $str, $phone))
        {
//            dd(1111);
        if (!empty($phone)) {
            $input['user_phone'] = $input['user_email'];
//               dd(11);
            $rule = [
                'user_phone' => 'required|size:11',
                'user_password' => 'required|between:5,20',
            ];

            $mess = [
                'user_phone.required' => '手机号不能为空',
                'user_phone.required' => '手机长度不合适',
                'user_password.required' => '密码必须输入',
                'user_password.between' => '密码必须在5到20位之间',
            ];
            $validator = Validator::make($input, $rule, $mess);
            //dd($validator);
            //如果表单验证失败
            if ($validator->fails()) {
                return redirect('emailregister')
                    ->withErrors($validator)
                    ->withInput();
            }
            //判断是否有此用户
            $user = Users::where('user_phone', $input['user_phone'])->first();
            if (!$user) {
                return redirect('phoneregister')->with('errors', '用户名不存在');
            }
            // dd($user);
            //密码
            $input['user_password'] = Hash::make($input['user_password']);

            if (!($user->user_password = $input['user_password'])) {
                return redirect('emailregister')->with('errors', '密码不正确');
            } else {
                Session::put('users', $user);
                return redirect('home/message')->with('errors', '登录成功');
            }

        }
        } else if (preg_match_all('/^[a-z0-9]+([._\\-]*[a-z0-9])*@([a-z0-9]+[-a-z0-9]*[a-z0-9]+.){1,63}[a-z0-9]+$/', $str, $email)) {
            if (!empty($email)) {
//                $input['user_email'] = $input['user_phone'];
//                dd(2222);
                $rule = [
                    'user_email' => 'email',
                    'user_password' => 'required|between:5,20',
                ];
                $mess = [
                    'user_email.required' => '邮箱格式不正确',
                    'user_password.required' => '密码必须输入',
                    'user_password.between' => '密码必须在5到20位之间',
                ];
                //如果表单验证失败
                $validator = Validator::make($input, $rule, $mess);
                if ($validator->fails()) {
                    return redirect('emailregister')
                        ->withErrors($validator)
                        ->withInput();
                }
                //判断是否有此用户
                $user = Users::where('user_email', $input['user_email'])->first();

                if (!$user) {
                    return redirect('phoneregister')->with('errors', '用户名不存在');
                }
                // dd($user);
                //密码
                $input['user_password'] = Hash::make($input['user_password']);

                if (!($user -> user_password = $input['user_password'])){
                    return redirect('phoneregister')->with('errors', '密码不正确');
                }else{
                    Session::put('users', $user);
                    return redirect('home/message')->with('errors', '登录成功');
                }

            }

        }

    }


    // 退出登陆
    public function outlogin()
    {
        // return 111;
        session()->flush();
        return redirect('home/index');
    }

}
