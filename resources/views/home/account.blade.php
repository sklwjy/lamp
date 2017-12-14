<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>账号设置 - 灵步微博</title>
<link href="{{ asset('/home/styles/global.css') }}" type="text/css" rel="stylesheet" />
<link href="{{ asset('/home/styles/account.css') }}" type="text/css" rel="stylesheet" />
<script src="{{ asset('/home/script/sitedata_bas.js') }}" language="javascript"></script>
</head>

<body>


<form id="form1" name="form1" method="post" action="{{ asset('account')  }}">
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
                   {{session('msg')}}
        <div class="alert alert-danger">{{session('msg')}}</div>
@endif
{{csrf_field()}}
<!-- container部分DIV -->
<div id="container">
    <!-- banner部分DIV -->
    <div id="banner">
        <!-- banner部分的leftDIV -->
        <div class="left" id="left">
            <table width="564" border="0" cellpadding="0" cellspacing="0" class="left">
                <!-- 昵称 -->
                <tr>
                    <td width="120" height="50" align="right"><strong>昵称</strong></td>
                    <td width="20" height="60">&nbsp;</td>
                    <td width="425" height="60"><label>
                         <input name="realname" type="text" class="n1" id="realname" value="DarkDemon"/>
<br />
                              您的昵称将显示在您的主页中</label></td>
                </tr>
                <!-- 个性域名 -->
                <tr>
                {{--还是不行<input type="radio" name="ww"/>男<input type="radio" name="ww"/>女--}}

                <!-- 邮箱 -->
                <tr>
                    <td width="120" height="49" align="right"><strong>邮箱</strong></td>
                    <td width="20" height="49">&nbsp;</td>
                    <td width="425" height="49"><label>
                         <input name="userinfo_email" type="text" class="n3" id="textfield3" />
                             </label></td>
                </tr>
                <tr>
                    <td width="120" height="49" align="right"><strong>地址</strong></td>
                    <td width="20" height="49">&nbsp;</td>
                    <td width="425" height="49"><label>
                         <input name="userinfo_address" type="text" class="n3" id="textfield3" />
                             </label></td>
                </tr>
                <!-- 地址 -->
                {{--<tr>--}}
                    {{--<td width="120" height="52" align="right"><strong>地址</strong></td>--}}
                    {{--<td width="20" height="52">&nbsp;</td>--}}
                    {{--<td width="425" height="52"><label>--}}
            {{--<select name="region1" class="tb" id="region1">--}}
{{--</select>--}}
          {{--</label>--}}
            {{--<label>--}}
              {{--<select name="userinfo_address" class="tb" id="region2">--}}
{{--</select>--}}
              {{--<select name="userinfo_addresss" class="tb" id="region3">--}}
              {{--</select>--}}
              {{--<br />--}}
            {{--你在哪？让你周围的更多的朋友找到你</label></td>--}}
                {{--</tr>--}}
                <!-- 个人站点 -->
                <tr>
                    <td width="120" height="68" align="right"><strong>个人站点</strong></td>
                    <td width="20" height="68">&nbsp;</td>
                    <td width="425" height="68"><label>
                        <input name="userinfo_web" type="text" class="n1" id="textfield4" />
                        <br />
                         你的网站、博客地址，让大家更多地了解你</label></td>
                </tr>
                <!-- 个性签名 -->
                <tr>
                    <td width="120" height="180" align="right"><strong>个性签名</strong></td>
                    <td width="20" height="180">&nbsp;</td>
                    <td width="425" height="180">
                       <div>
                            <label>
                                  <textarea name="userinfo_intro" class="n4" id="textfield5"></textarea>
                            </label>
                       </div></td>
                </tr>
                <!-- 隐私 -->
                <tr>
                    <td width="120" height="29" align="right"><strong>隐私</strong></td>
                    <td width="20" height="29">&nbsp;</td>
                    <td width="425" height="29"><label>
                       <input name="sec" type="radio" id="radio" value="sec" checked="checked" />
                        所有人可见
                       <input type="radio" name="sec" id="radio2" value="sec" />
                        关注我的人可见
                             </label></td>
                </tr>
                <!-- 保存按钮 -->
                <tr>
                    <td width="120" height="44" align="right">&nbsp;</td>
                    <td width="20" height="44">&nbsp;</td>
                    <td width="425" height="44"><label>
                         <input name="button" type="submit" class="btn" id="button" value="保存" />
                            </label></td>
                </tr>
            </table>
        </div>
        <!-- banner_left部分DIV结束 -->
        <!-- banner_right部分DIV -->
        <div class="right" id="right">
           <p>在这里
              ，你可以设置你账号的基本信息，隐私信息等</p>
        </div>
        <!-- banner_right部分DIV结束 -->
    </div>
    <!-- banner部分DIV结束 -->
</div>
<!-- container部分DI结束V -->
</form>
</body>
</html>
