<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
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

    public function yzm()
    {
    	$code = new Code();
    	$code->make();
    }

     // 验证码生成
    // public function yzm()
    // {
    //     $phrase = new PhraseBuilder;
    //     // 设置验证码位数
    //     $code = $phrase->build(4);
    //     // 生成验证码图片的Builder对象，配置相应属性
    //     $builder = new CaptchaBuilder($code, $phrase);
    //     // 设置背景颜色
    //     $builder->setBackgroundColor(220, 210, 230);
    //     $builder->setMaxAngle(25);
    //     $builder->setMaxBehindLines(0);
    //     $builder->setMaxFrontLines(0);
    //     // 可以设置图片宽高及字体
    //     $builder->build($width = 100, $height = 40, $font = null);
    //     // 获取验证码的内容
    //     $phrase = $builder->getPhrase();
    //     // 把内容存入session
    //     \Session::flash('code', $phrase);
    //     // 生成图片
    //     header("Cache-Control: no-cache, must-revalidate");
    //     header("Content-Type:image/jpeg");
    //     $builder->output();
    // }

    // public function dologin(Request $request)
    // {
    // 	$input = $request->except('_token');
    // 	dd($input);

    // 	// 对数据进行后台表单验证
    // 	// Validator::make(要验证的数据,验证规则,提示信息);
    	
    // 	// 验证规则
    // 	// $rule = [
    // 	// 	'admin_name'=>
    // 	// ]

    // }
}
