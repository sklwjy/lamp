<?php

namespace App\Http\Controllers\Home;

//use Illuminate\Http\Request;
//use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Hash;
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
        // dd($input);

        // ?֤???
        $rule = [
            'user_email' => 'email',
            'user_password' => 'required|between:5,20',

//            'user_phone' => 'required|size:11',
        ];

        // ?ʾ?Ϣ
        $mess = [
               'user_email.email' => '????????ȷ',
                'user_password.required' => '???????',
                'user_password.between' => '????????20λ֮??',
                'user_phone.required' => '????Ų??Ϊ??',
                'user_phone.size' => '????ų??Ȳ????',
            ];


            $validator = Validator::make($input, $rule, $mess);
            //???????֤ʧ??passes()
            if ($validator->fails()) {
                return redirect('home/login')
                    ->withErrors($validator)
                    ->withInput();
        }
        // 3 ??????

        //3.1 ???Ƿ?д?û?

        if($input['user_email']){
            $user = Users::where('user_email', $input['user_email'] )->first();
        }

        // dd($user);
        if(!$user){
            return redirect('home/login')->with('errors', '?????????');
        }

        // 3.2 ??????ȷ
        // $user->admin_pass   $input['admin_pass']
        if(!(Hash::check(trim($input['user_password']), $user->user_password))){
            return redirect('home/login')->with('errors', '?????ȷ');
        }

        //4 ????ɹ?, ??????Ϣ???浽session?, ?????û????¼??????????Ϣ
        Session::put('users', $user);
<<<<<<< HEAD
        return redirect('home/index');
=======

        return redirect('home/message');
>>>>>>> origin/wxf

    }

    // ??????
    public function outlogin()
    {
        // return 111;
        session()->flush();
        return redirect('home/login');
    }


   



  //΢??ע??

    public function register()
    {
//        return 11;
            return view('home/register');

    }

//     public function yzm()
//     {
//     	$code = new Code();
//     	$code->make();
//     }

    // ?֤????
    public function yzm()
    {
        $phrase = new PhraseBuilder;
        // ???֤?λ?
        $code = $phrase->build(4);
        // ??????ͼƬ??uilder?????????
        $builder = new CaptchaBuilder($code, $phrase);
        // ???????ɫ
        $builder->setBackgroundColor(220, 210, 230);
        $builder->setMaxAngle(25);
        $builder->setMaxBehindLines(0);
        $builder->setMaxFrontLines(0);
        // ??????Ƭ??߼???
        $builder->build($width = 100, $height = 40, $font = null);
        // ????֤?????
        $phrase = $builder->getPhrase();
        // ???ݴ??ession
        \Session::flash('code', $phrase);
        // ????Ƭ
        header("Cache-Control: no-cache, must-revalidate");
        header("Content-Type:image/jpeg");
        $builder->output();
    }

    public function doregister(Request $request)
    {
       // return 11;
        $input = $request->except('_token');
        //dd($input);

        //?֤???
        $rule = [
            'user_name' => 'required|min:6|max:18',
            'user_email' =>  'email',
            'user_phone' => 'required|size:11',
            'user_password' => 'required|between:5,20',
            'user_rpassword' => 'same:user_rpassword',

        ];

        // ?ʾ?Ϣ
        // $mess = [
        //     'user_name.required' => '???????Ϊ??,
        //     'user_name.required' => '??????????18λ֮??,
        //     'user_password.required' => '???????,
        //     'user_password.between' => '????????20λ֮??,
        //     'user_rpassword.same' => 'ȷ?????һ?',
        //     'user_email.email' => '????????ȷ',
        //     'user_phone.required' => '????Ų??Ϊ??,
        //     'user_phone.size' => '????ų??Ȳ????,
        // ];


        $validator = Validator::make($input, $rule, $mess);
        //???????֤ʧ??passes()
        if ($validator->fails()) {
            return redirect('home/register')
                ->withErrors($validator)
                ->withInput();
        }

        if($input['code'] != \Session::get('code')) {
            return redirect('home/register')->with('errors', '?֤????');
        }
       // dd($input);
//        $input = $request->except('code');
//         $res =   Users::create($input);
//        dd($res);
        $data = [
            'user_name'=>$input['user_name'],
            'user_time'=>time(),
            'user_phone' =>$input['user_phone'],
            'user_password' =>Hash::make($input['user_password']),
            'user_status' =>0,
            'user_email' =>$input['user_email'],
        ];

        // dd($data);

           $res =  Users::create($data);
       // dd($res);
        
        return redirect('home/login');

    }

}
