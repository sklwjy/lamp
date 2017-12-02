<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>注册 灵步网微博-点滴生活，精彩每一天</title>
<link href="{{ asset('a/styles/register.css') }}" type="text/css" rel="stylesheet" />
<link href="{{ asset('a/styles/global.css') }}" type="text/css" rel="stylesheet" />
{{--<script src="{{  asset('a/script/sitedata_bas.js') }}" language="javascript"></script>--}}
<script src="{{  asset('a/script/datecreate.js') }}" language="javascript"></script>
<script src="{{  asset('a/script/trim.js') }}" language="javascript"></script>
{{--<script src="{{  asset('a/script/register.js') }}" language="javascript"></script>--}}
</head>
<body>
<div id="container">
  <!-- top部分DIV -->
	<div id="top">
    	<!-- top部分的LogoDIV -->
    	<div id="topLogo">
        	<!-- topLogo部分的icoDIV -->
            <div id="topLogoIco"> <a href="#"><img src="{{asset('a/images/logo_ipad.png')}}" width="72" height="72" alt="" /></a>
        </div>
            <!-- topLogo部分的icoDIV结束 -->
            
            <!-- topLogo部分的wordDIV -->
            <div id="topLogoWord"> <a href="#"><img src="{{asset('a/images/LogoMaker.gif')}}" width="128" height="60" alt="" /></a>
          </div>
            <!-- topLogo部分的wordDIV -->
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
  <div id="banner">
    <div id="bannerTop">
      <div id="bannerWord1">加入灵步微博</div>
      <div id="bannerWord2">如果你已经是灵步网注册用户，请直接<a href="#">登陆微博</a></div>
      <div id="bannerWord3">已经是灵步微博用户？<a href="#">登陆微博</a></div>
    </div>
    <div id="main">
      <form action="{{ asset('home/doregister')  }}" method="post">
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
        {{csrf_field()}}




            <table width="765" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td width="71">&nbsp;</td>
          <td width="86" align="center" valign="middle" class="wordleft">用 &nbsp;户&nbsp; 名</td>
          <td width="189" align="center" valign="middle"><input name="user_name" type="text" value="{{old('user_name')}}" class="form" id="userID" /></td>
          <td width="419" align="left" valign="middle" class="wordright"><img name="img1" width="16" height="16" id="img1" /><div class="registertip" id="userIDtip">请输入真实姓名，方便您的朋友与你联系</div></td>
        </tr>

        <tr>
          <td>&nbsp;</td>
          <td align="center" valign="middle" class="wordleft">手 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;机</td>
          <td align="center" valign="middle" class="a"><input name="user_phone" type="text" value="{{old('user_phone')}}" class="form" id="userTel" /></td>
          <td align="left" valign="middle" class="wordright"><img name="img3" width="16" height="16" id="img3" /><div class="registertip" id="userTeltip">请输入您的手机号码，之后可以用手机及时发布信息</div></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td align="center" valign="middle" class="wordleft">电子邮箱</td>
          <td align="center" valign="middle"><input name="user_email" type="text"  value="{{old('user_email')}}" class="form" id="userMail" /></td>
          <td align="left" valign="middle" class="wordright"><img name="img4" width="16" height="16" id="img4" /><div class="registertip" id="userMailtip">找回账户和密码用，如123@163.com</div></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td align="center" valign="middle" class="wordleft">创建密码</td>
          <td align="center" valign="middle"><input name="user_password" type="password" class="form" id="userPass"  maxlength="20" /></td>
          <td align="left" valign="middle" class="wordright"><img name="img5" width="16" height="16" id="img5" /><div class="registertip" id="userPasstip">密码由6到20个字母、数字、特殊符号组成，字母区分大小写</div></td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td align="center" valign="middle" class="wordleft">密码确认</td>
          <td align="center" valign="middle"><input name="user_rpassword" type="password" class="form" id="userRpass"  maxlength="20" /></td>
          <td align="left" valign="middle" class="wordright"><img name="img6" width="16" height="16" id="img6" /><div class="registertip" id="userRpasstip">请再次输入密码</div></td>
        </tr>

                {{--<img src="{{url('home/yzm')}}" onclick="this.src='{{url('home/yzm')}}?'+Math.random()" alt="">--}}


        <tr>
          <td>&nbsp;</td>
          <td align="center" valign="middle" class="wordleft">验 &nbsp;证 &nbsp;码</td>
          <td align="center" valign="middle"><input name="code" type="text"  class="form" id="verify" maxlength="4" /></td>
          <td align="left" valign="middle" class="verifyword"> <span class="wordright">
          <div id="yanzhengma1"></div></span>
              {{--<img src="{{ url('home/yzm') }}" onclick="this.src='{{url('home/yzm')}}?'+Math.random()">--}}
              <a onclick="javascript:re_captcha();">
              <img src="{{ url('/home/yzm') }}" id="127ddf0de5a04167a9e427d883690ff6">
              </a>

              看不清？<a href="javascript:createCode()">换一换</a></td>
          </tr>




                <script type="text/javascript">
                    function re_captcha() {
                        $url = "{{ url('/home/yzm/') }}";
                        $url = $url + "?"  + Math.random();
                        document.getElementById('127ddf0de5a04167a9e427d883690ff6').src = $url;
                    }
                </script>
        <tr>
          <td height="35" colspan="4" align="center">
            <input name="checkbox" type="checkbox" id="checkbox" onclick="deal(this,button)" />
            我已经看过
          ，并同意<a href="#">《灵步网使用协议》</a></td>
          </tr>
        <tr>
          {{--<td colspan="4" align="center" valign="middle"><button>提交</button></td>--}}
            {{--<input colspan="4" align="center" valign="middle" type="submit" value="立即登陆"/>--}}
            <td colspan="4" align="center" valign="middle"><input type="submit"  name="button" id="button" value="立即注册" class="button"/></td>
          </tr>
      </table>
    </form>
    </div>
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
</div>
</body>
</html>
