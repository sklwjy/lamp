<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>账号设置 - 灵步微博</title>
<link href="{{ asset('/home/styles/global.css') }}" type="text/css" rel="stylesheet" />
<link href="{{ asset('/home/styles/account.css') }}" type="text/css" rel="stylesheet" />
<script src="{{ asset('/home/script/sitedata_bas.js') }}" language="javascript"></script>
<script src="{{ asset('/home/js/jquery-3.1.0.js') }}" language="javascript"></script>
<script type="text/javascript" src="{{asset('layer/layer.js')}}"></script>
<script src="{{asset('/home/js/jquery.js')}}"></script> 
<script src="{{asset('/home/js/birthday.js')}}"></script> 

</head>

<body>


<form id="form1" name="form1" method="post" action="{{ url('home/account/') }} " enctype="multipart/form-data">


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
                <input type="hidden" name="user_id" value="{{$userinfo['user_id']}}">
                <!-- 昵称 -->
                <tr>
                    <td width="120" height="50" align="right"><strong>昵称</strong></td>
                    <td width="20" height="60">&nbsp;</td>
                    <td width="425" height="60"><label>
                         <input name="userinfo_realname" type="text" class="n1" id="realname" value="{{  $userinfo->userinfo ['userinfo_realname'] }}"/>


                            &nbsp;
                            &nbsp;

                         {{--亲,  <input type="radio" name="userinfo_sex"  @if($userinfo->userinfo_sex  == 1)   checked @endif/>男--}}
                                  {{--<input type="radio"  name="userinfo_sex"  @if($userinfo->userinfo_sex  == 0)   checked @endif/>女--}}

                                @if($userinfo['userinfo']['userinfo_sex'] == 1)
                            <input type="radio" name="userinfo_sex") checked="checked" value="{{$userinfo['userinfo']['userinfo_sex']}}">男

                            <input type="radio" name="userinfo_sex")  value="{{$userinfo['userinfo']['userinfo_sex']}}">女
                                    @elseif($userinfo['userinfo']['userinfo_sex'] == 0)
                            <input type="radio" name="userinfo_sex")  value="{{$userinfo['userinfo']['userinfo_sex']}}">男

                            <input type="radio" name="userinfo_sex") checked="checked" value="{{$userinfo['userinfo']['userinfo_sex']}}">女
                                 @endif
                            <br />
                              您的昵称将显示在您的主页中</label></td>
                </tr>
                <!-- 个性域名 -->
                <tr>


                <!-- 邮箱 -->
                <tr>
                    <td width="120" height="49" align="right"><strong>邮箱</strong></td>
                    <td width="20" height="49">&nbsp;</td>
                    <td width="425" height="49"><label>
                         <input name="userinfo_email" type="text" class="n2" id="textfield3" value="{{ $userinfo->userinfo['userinfo_email'] }}"/>
                             </label></td>
                </tr>
            
                <!-- 地址 -->
                <tr>
                    <td width="120" height="52" align="right"><strong>地址</strong></td>
                    <td width="20" height="52">&nbsp;</td>
                    <td width="425" height="52">
            <label>
            <select name="a" class="tb" id="region1">
            </select>
          </label>
            <label>
              <select name="b" class="tb" id="region2">
                </select>
                </label>  
                <label>  
              <select name="c" class="tb" id="region3">
              </select>
              </label>
              <br />
        
       
              <br>
              <div>
              <label> 生日：</label>  
            <select class="sel_year" rel="2000"> </select> 年 
            <select class="sel_month" rel="2"> </select> 月 
            <select class="sel_day" rel="14"> </select> 日 
            </div>
            {{--你在哪？让你周围的更多的朋友找到你</label></td>--}}
                {{--</tr>--}}
                <!-- 个人站点 -->
                <tr>
                    <td width="120" height="68" align="right"><strong>个人站点</strong></td>
                    <td width="20" height="68">&nbsp;</td>
                    <td width="425" height="68"><label>
                        <input name="userinfo_web" type="text" class="n3" id="textfield4" value="{{ $userinfo->userinfo['userinfo_web'] }}"/>
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
                                  <textarea name="userinfo_intro" class="n4" id="textfield5" >{{ $userinfo ->userinfo['userinfo_intro'] }}</textarea>
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
                             </label>
                             

                        </td>
                </tr>
                <script type="text/javascript">
                    
                </script>
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
        <div class="right" id="right"  class="box">
           <p>在这里
              ，你可以设置你账号的基本信息，隐私信息等</p>
              <input type="text" size="20" id="art_thumb" name="art_thumb" style="display: none;">
              
          <div>
          <img src="{{asset($userinfo->userinfo['userinfo_file'])}}" onclick="abcd()" id="img1" alt="" style="width:130px;height:150px;border-radius:100px; margin:0 auto; ">
        <input id="userinfo_file"  name="userinfo_file" type="file" style="display: none;multiple="true" >
            <div id="time" style="color: skyblue; font-size: 30px;"></div>
            <script>  
                $(function () {
                    $.ms_DatePicker({
                            YearSelector: ".sel_year",
                            MonthSelector: ".sel_month",
                            DaySelector: ".sel_day"
                    });
                    $.ms_DatePicker();
                }); 
            </script> 
            
            <script type="text/javascript">
              // alert($); 
              $(".n1").on('blur',function(){
       
                    var vall = $(this).val();
                    // var name = $(this
                   
                    $.ajax({
                        url:'/home/accounts',
                        type:"post",
                        data:{'n1':vall,'_token':" {{csrf_token()}}"},
                        
                        success:function(data){

                           console.log(data);
                            if (data) {
                                layer.msg('更新成功');
                                $('.n1').val(vall);
                            location = location;
                            }else{
                                layer.msg('更新失败');
                            };
                        }

                    });
              });

              
            </script>

    <script type="text/javascript">
        
        // 1. 获取div
        var time = document.getElementById('time');

        // 2. 书写定时器。
        setInterval(function(){
            run();
        }, 1000);

        function run()
        {
            var mydate = new Date();
            var y = mydate.getFullYear();
            var m = mydate.getMonth();
            var d = mydate.getDate();
            var h = mydate.getHours();
            var mm = mydate.getMinutes();
            var s = mydate.getSeconds();
            if(m < 10)
            {
                m = '0' + m;
            }
            if(d < 10)
            {
                d = '0' + d;
            }

            if(h < 10)
            {
                h = '0' + h;
            }
            if(mm < 10)
            {
                mm = '0' + mm;
            }
            if(s < 10)
            {
                s = '0' + s;
            }
            var str = y + '-' + m + '-' + d + ' ' + h + ':' + mm + ':' + s;

            time.innerHTML = str;
        }
        
        run();


    </script>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
<div>
    <a href="">我的收藏</a> <br>
    <br>
    <a href="">我的粉丝</a> 
    <br><br>
    <a href="">我的好友</a> <br>
    <br> 

            <ul>
            <li>
                <h3><i class="fa fa-fw fa-clipboard"   style="color: skyblue"><a href=""></i>我的关注</a></h3>
                <ul class="sub_menu">
                    <li><a href="{{url('home/friend')}}" target="main"><i class="fa fa-fw fa-plus-square"></i>关注我的</a></li>
                    <li><a href="{{url('home/focusonyou')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>我的关注</a></li>

                </ul>
            </li>
            </ul>
         
    </div>
            </div>

            <script type="text/javascript">
                function abcd()
                {
                    $("#userinfo_file").click();
                }

                $(function () {
                    $("#userinfo_file").change(function () {
                       // alert(111);
                        $('img1').show();
                        uploadImage();
                    });
                });
                function uploadImage() {
                    // 判断是否有选择上传文件
                    var imgPath = $("#userinfo_file").val();
                    //alert (11);
                    if (imgPath == "") {
                        alert("请选择上传图片！");
                        return;
                    }
                    //判断上传文件的后缀名
                    var strExtension = imgPath.substr(imgPath.lastIndexOf('.') + 1);
                    if (strExtension != 'jpeg' && strExtension != 'gif'
                        && strExtension != 'png' && strExtension != 'bmp' && strExtension != 'jpg') {
                        alert("请选择图片文件");
                        return;
                    }
                    var formData = new FormData($('#form1')[0]);
                   

                    $.ajax({
                        type: "POST",
                        url: "/home/file",
                        data: formData,
                        async: true,
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(data) {
                            $('#img1').attr('src','/uploads/'+data);
//                                            $('#img1').attr('src','http://p09v2gc7p.bkt.clouddn.com/uploads/'+data);
                            // $('#img1').attr('src','http://project193.oss-cn-beijing.aliyuncs.com/'+data);
                            $('#img1').show();
                            $('#art_thumb').val('/uploads/'+data);

                        },
                        error: function(XMLHttpRequest, textStatus, errorThrown) {
                            alert("上传失败，请检查网络后重试");
                        }
                    });
                }
                    
                
            </script>
        </div>
        <!-- banner_right部分DIV结束 -->
    </div>
    <!-- banner部分DIV结束 -->
</div>
<!-- container部分DI结束V -->
</form>
</body>
</html>
