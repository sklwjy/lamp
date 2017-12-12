<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>΢������</title>
    <link href="{{ asset('home/styles/global.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ asset('home/styles/login.css') }}" type="text/css" rel="stylesheet" />

    <link rel="shortcut icon" href="./favicon.ico">
</head>

<body>
<!--页面整体-->
<div id="container">
<!-- top部分DIV -->
	<div id="top">
    	<!-- top部分的LogoDIV -->
    	<div id="topLogo">
        	<!-- topLogo部分的icoDIV -->
            <div id="topLogoIco"> <a href="index.html"><img src="{{asset('home/images/logo_ipad.png')}}" width="72" height="72" alt="" /></a>
          </div>
            <!-- topLogo部分的icoDIV结束 -->
            
            <!-- topLogo部分的wordDIV -->
            <div id="topLogoWord"> <a href="index.html"><img src="{{asset('home/images/LogoMaker.gif')}}" width="128" height="60" alt="" /></a>
          </div>
            {{--<!-- topLogo部分的wordDIV -->LogoMaker.gif--}}
        </div>
        <!-- top部分的LogoDIV结束 -->
        
        <!-- top部分的文字导航 -->
        <div id="topWordMenu">
        	<ul>
            	<li>已有灵步账号，<a href="{{ asset('home/login')  }}">请登录</a></li>
                <li><a href="SBGG.html">随便逛逛</a></li>
                <li><a href="#">手机</a></li>
                <li><a href="#">帮助</a></li>
            </ul>
        </div>
        <!-- top部分的文字导航结束 -->
    </div>
    <!-- top部分结束 -->
<!-- 页面主体 -->
 <div id="banner">
   <!-- 页面左部 -->
   <div id="left">
   <!--页面左部表单设置-->
   <form id="LoginForm" action="{{ asset('doreset') }}" method="post">
       @if (count($errors) > 0)
           <div class="alert alert-danger">
               <ul>
                   @if(is_object($errors))
                       @foreach ($errors->all() as $error)
                           <li style="color:red">{{ $error }}</li>
                       @endforeach
                   @else
                       <li style="color:red">{{ $errors }}</li>
                   @endif
               </ul>
           </div>
       @endif
       @if(session('msg'))
{{--           {{session('msg')}} --}}
               <div class="alert alert-danger">{{session('msg')}}</div>
       @endif
       {{csrf_field()}}
     <table width="565" border="0" cellspacing="0" cellpadding="0">
       <tr class="lb">
         <td></td>
         <td></td>
         <td></td>
         <td></td>
       </tr>
       <tr>
         <td class="le"></td>
         <td class="ld">请输入您要找回密码的账号</td>
         <td class="if"><input name="user_email"value="{{ $user_name  }}" type="text" class="la" id="user_email" /></td>
         <td></td>
       </tr>
       <tr>
         <td class="le"></td>
         <td class="ld">密码</td>
         <td class="if"><input name="user_password" type="password" class="la" id="user_password" /></td>
         <td></td>
       </tr>
         <tr>
             <td class="le"></td>
             <td class="ld">确认密码</td>
             <td class="if"><input name="user_rpassword" type="password" class="la" id="user_password" /></td>
             <td></td>
         </tr>
       <tr>
         <td class="le"></td>
         <td class="ld"></td>
         <td><input name="checkbox" type="checkbox" id="checkbox"  />
           下次自动登陆&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="#">忘记密码</a></td>
           <td></td>
       </tr>
         <tr>
             <td class="le"></td>
             <td class="ld"></td>
             <td>

                 {{--<input name="button" type="submit" class="lc" id="button" value="登  录" />--}}
                 <button class="lc" id="button">登录</button>
             </td>
         <td></td>
       </tr>
     </table>
     </form>
     <!--页面左部表单结束-->
   </div>
   <!-- 页面右部 -->
   <div id="right">
   			<!--页面右部文字及按钮设置-->
   			<div class="bs">
                还没有微博？
            </div>
            <div class="cs">
           		赶快来注册一个吧
            </div>
            <div class="ds"><a href="{{ url('phoneregister' )}}"><img src="{{asset('home/images/anniu.gif')}}" alt="立即注册" width="155" height="48" border="0" title="在这注册" /></a>
            </div>
   	</div>
  </div>
   <!--页面右部文字及按钮设置结束-->
<!-- footer部分 -->
    <div id="footer">
    	<!-- footer网站链接部分 -->
    	<div id="footerLink">
        	<ul>
            	<li><a href="#">灵步网介绍</a></li>
                <li><a href="#">广告服务</a></li>
                <li><a href="#">API</a></li>
                <li><a href="#">诚征英才</a></li>
                <li><a href="#">保护隐私权</a></li>
                <li><a href="#">免责条款</a></li>
                <li><a href="#">法律顾问</a></li>
                <li><a href="#">意见反馈</a></li>
            </ul>
        </div>
        <!-- footer网站链接部分结束 -->
        <!-- footer网站版权信息 -->
        <div id="footerCopy">
        	Copyright&copy;2011-2012 灵步小组 版权所有
        </div>
        <!-- footer网站版权信息结束 -->
    </div>
    <!-- footer部分结束 -->
</div>
</body>
</html>
