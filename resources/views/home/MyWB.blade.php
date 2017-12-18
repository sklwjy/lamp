<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=yes" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="format-detection" content="telephone=no" />
    <title>微博</title>
    <link rel="stylesheet" type="text/css" href="https://img.t.sinajs.cn/t6/style/css/module/list/comb_WB_feed_profile.css?version=d734c0d1947e41c8">
    <link rel="stylesheet" type="text/css" href="https://img.t.sinajs.cn/t6/style/css/module/list/comb_WB_feed_profile.css?version=d734c0d1947e41c8">
    <link rel="stylesheet" type="text/css" href="https://img.t.sinajs.cn/t6/skin/skin048/skin.css?version=d734c0d1947e41c8">
    <link rel="stylesheet" type="text/css" href="https://img.t.sinajs.cn/t6/style/css/module/base/frame.css?version=d734c0d1947e41c8">
    <link rel="stylesheet" href="{{ asset('home/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/style2.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/style1.css') }}" media="screen" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/style3.css') }}">

</head>
<body>
<nav class="navbar  navbar-fixed-top" role="navigation" style="background: #e0620d ;padding-top: 3px;height:50px;">
    <div class="container-fluid" style="background: #fff;">
        <div class="navbar-header ">
            <span class="navbar-brand " href="#">WEIBO</span>

            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#my-navbar-collapse">
                <span class="sr-only">切换导航</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <form class="navbar-form navbar-left" role="search">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="#热门话题#">
                <i class="glyphicon glyphicon-search btn_search" ></i>
                <!--  <button type="submit" class="btn btn-default">提交</button> -->
            </div>

        </form>

        <div class="collapse navbar-collapse" id="my-navbar-collapse">

            <ul class="nav navbar-nav navbar-right" >
           <!--   <li>
                    {{session('users')['user_name']}}
                </li> -->
            
                <li>

                    <a  href="{{asset('home/index')}}"><i class="glyphicon glyphicon-home"></i>
                        首页</a>
                </li>

               

                <li ><a href="{{ asset('home/account')  }}"><i class="glyphicon glyphicon-user"></i>&nbsp;&nbsp;{{session('users.user_name')}}</a></li>

              <!--   <li ><a href="#"><i class="glyphicon glyphicon-user"></i>{{ session('users.user_name') }}</a></li>
 -->
                <li>
                    <a data-ga="" data-ga-action="click" data-ga-category="Header Navigation " data-ga-title="Pricing" href="">
                        <i class="glyphicon glyphicon-envelope"></i>
                    </a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="glyphicon glyphicon-cog">
                            设置</i> <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="#">账号设置</a></li>
                        <li><a href="{{url('home/outlogin')}}">退出</a></li>

                    </ul>
                </li>
            </ul>

        </div>


    </div>
    <hr style="margin: 0;padding: 0;color:#222;width:100%">
</nav>

<div class="container container_bg" >
    <div class="row">
        <div class="col-sm-2" style="margin-top:70px; ">
            <div style="position:fixed;z-index:9999" class="container; ">
                <nav>
                    <ul class="mcd-menu" style="width:185px;height:0px">
                        <li> <a href=""> <i class="fa fa-home"></i> <strong>首页</strong> </a> </li>
                        <li> <a href="" class="active"> <i class="fa fa-edit"></i> <strong>热门微博</strong></a> </li>
                        <li> <a href=""> <i class="fa fa-gift"></i> <strong>我的收藏</strong></a> </li>
                        <li> <a href=""> <i class="fa fa-globe"></i> <strong>我的赞</strong> </a> </li>
                        <li> <a href=""> <i class="fa fa-comments-o"></i> <strong>好友圈</strong>  </a>
                            <ul>
                                <li><a href="#"><i class="fa fa-globe"></i>朋友</a></li>
                                <li> <a href="#"><i class="fa fa-group"></i>同学</a>
                                </li>
                                <li><a href="#"><i class="fa fa-trophy"></i>明星</a></li>
                                <li><a href="#"><i class="fa fa-certificate"></i>其他</a></li>
                            </ul>
                        </li>
                        <li> <a href=""> <i class="fa fa-picture-o"></i> <strong>@我</strong>  </a> </li>
                        <li> <a href=""> <i class="fa fa-envelope-o"></i> <strong>私信</strong> </a> </li>
                        <li class="float"> <a class="search">
                            </a> <a href="" class="search-mobile"> <i class="fa fa-search"></i> </a> </li>
                    </ul>
                </nav>
            </div>
        </div>
    

       <!--  微博显示区 -->
        <div class="col-sm-6 col-xs-12 my_edit" id="weibo">
            <div class="row" id="edit_form" >
                <span class="home/message"pull-left" style="margin:10px;font-size:18px;">编写新鲜事</span>
                <span class="tips pull-right" style="margin:15px;"></span>
    <form id="messages_form"  action="{{ url('home/message') }}" mothod="post" style="margin-top: 30px;" enctype="multipart/form-data">
        {{ csrf_field() }}
                    <div class="form-group">
                        <div class="col-sm-12">
                            <div contentEditable="true" id="content" class="form-control " ></div>
                        </div>

                        <div class="col-sm-12" style="margin-top: 12px;">
                            <span class="emoji" >表情</span>

                            <span id="picture"  ><input type="file"  id="file_upload" name="file_upload" multiple="true" />图片</span>
                            <input type="hidden" id="message_thumb" name="message_thumb">
                            <span id="pict">
                                <img src="" id="image" alt="" style="width:50px;height:50px">
                            </span>
                            <script src="{{ asset('home/js/jquery-3.1.0.js') }}"></script>
                            <script type="text/javascript">
                                $(function () {
                                    $("#file_upload").change(function () {
                                        $('#image').show();
                                        uploadImage();
                                    });
                                });
                                function uploadImage() {
                                    // 判断是否有选择上传文件
                                    var imgPath = $("#file_upload").val();

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

                                    // var formData = new FormData($('#art_form')[0]); // 这里必须是以数组的形式传过去的
                                    var formData = new FormData();

                                    formData.append('file_upload', $('#file_upload')[0].files[0]);
                                    formData.append('_token',"{{csrf_token()}}");

                                    $.ajax({
                                        type: "POST",
                                        url: "/home/upl",
                                        data: formData,
                                        async: true,
                                        cache: false,
                                        contentType: false,
                                        processData: false,
                                        success: function(data) {
                                            $('#image').attr('src','/uploads/'+data);
//                                             $('#img1').attr('src', 'http://p0dwlzk2l.bkt.clouddn.com/uploads/'+data);
                                            $('#image').show();
                                            $('#message_thumb').val('/uploads/'+data);
                                        },
                                        error: function(XMLHttpRequest, textStatus, errorThrown) {
                                            alert("上传失败，请检查网络后重试");
                                        }
                                    });

                                }
                            </script>
                            <span>
                                <input type="hidden" idname="{{ session( 'users.user_id ') }}" >
                            </span>
                            <div class="myEmoji" >
                                <ul id="myTab" class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#set" data-toggle="tab">
                                            常用
                                        </a>
                                    </li>
                                    <li><a href="#hot" data-toggle="tab">热门</a></li>

                                </ul>
                                <div id="myTabContent" class="tab-content">
                                    <div class="tab-pane fade in active" id="set">
                                        <div class="emoji_1"></div>

                                    </div>
                                    <div class="tab-pane fade" id="hot">
                                        <div class="emoji_2"></div>
                                    </div>

                                </div>
                            </div>
                             {{--<span> <input type="file" id="selectImg" value=""></input> </span>--}}
                            <button type="button" id="send" class="btn btn-default pull-right" >发布</button>
                        </div>
                    </div>
    </form>
            </div>
            <!-- 微博显示区结束 -->
            <div class="row item_msg" >
                @foreach($messages as $k=>$v)
                <div class="col-sm-12 col-xs-12 message" >
                    <img src="{{ asset('home/images/mywb/icon.png') }}" class="col-sm-2 col-xs-2" style="border-radius: 50%">
                    <div class="col-sm-9 col-xs-9">
                        <span style="font-weight: bold;">{{ session('users.user_name') }}</span>
                        <br>
                        <small class="date" style="color:#999">{{ $v['messages_time'] }}</small>
                        <div class="msg_content">{!! $v['messages_content'] !!}
                            @if( !$v['messages_picture'] == '')
                                <img class="mypic" src="{{ asset($v['messages_picture']) }}" >
                             @endif
                        </div>
                    <ul class="WB_row_line WB_row_r4 clearfix S_line2">
                        <li>
                            <a class="S_txt2" suda-uatrack="key=profile_feed&amp;value=collect_guest" href="javascript:void(0);"><span class="pos"><span class="line  " ><span><em class="W_ficon ficon_favorite S_ficon">û</em><em>收藏</em></span></span></span></a>
                         </li>
                         <li>
                            <a href="javascript:void(0);" class="S_txt2" ><span class="pos"><span class="line  "><span><em class="W_ficon ficon_forward S_ficon"></em><em>0</em></span></span></span></a>
                        </li>
                        <li class=" curr">
                            <a href="javascript:void(0);" class="S_txt2"><span class="pos"><span class="line  "><span><em class="W_ficon ficon_repeat S_ficon"></em><em>0</em></span></span></span></a>
                        </li>
                        <li>
                            <!--cuslike用于前端判断是否显示个性赞，1:显示-->
                            <a href="javascript:void(0);" class="S_txt2"  title="赞" ><span class="pos"><span class="line  ">
                                <span class=""><em class="W_ficon ficon_praised S_txt2">ñ</em><em>0</em></span>
                         </li>
                    </ul>
                    </div>
                    <div>
                            <span><a href="javascript:;" onclick="delmessage( {{ $v['messages_id'] }} )"><i class="glyphicon glyphicon-trash"></i> 删除</a></span>
                    </div>
                </div>
                @endforeach
            </div>
        </div>


        <div class="col-sm-3 col-xs-12 part_right" >
            <div class="row text-center inform">
                <img src="{{ asset('home/images/mywb/icon.png') }}" >
                <h4 style="font-weight: bold;">{{ session('users.user_name') }}</h4>
                <div class="col-sm-12 my_inform" >
                    <div class="col-sm-4 col-xs-4">
                        <div>111</div>
                        <div class="sort">关注</div>

                    </div>
                    <div class="col-sm-4 col-xs-4">
                        <div>111</div>
                        <div class="sort">粉丝</div>
                    </div>
                    <div class="col-sm-4 col-xs-4">
                        <div>111</div>
                        <div class="sort">博客</div>
                    </div>
                </div>
            </div>
            <div class="row part_hot" >
                <div class="col-sm-12">
                    <span class="pull-left" style="padding: 10px;font-size:16px;font-weight: bold;">热门话题</span>
                    <span class="pull-right" style="padding: 10px;">换话题</span>
                </div>
                <hr style="margin: 0;padding: 0;width: 100%">

                <div class="col-sm-12 item_hot" >
                    <span class="pull-left">#英雄联盟s7#</span>
                    <span class="pull-right item_num">34.6亿</span>
                </div>

                <div class="col-sm-12 item_hot" >
                    <span class="pull-left">#今天霜降#</span>
                    <span class="pull-right item_num">2.6亿</span>
                </div>

                <div class="col-sm-12 item_hot" >
                    <span class="pull-left">#亚洲新歌榜#</span>
                    <span class="pull-right item_num">10.4亿</span>
                </div>

                <div class="col-sm-12 item_hot" >
                    <span class="pull-left">#扑通扑通少女心#</span>
                    <span class="pull-right item_num">1.5亿</span>
                </div>

                <div class="col-sm-12 item_hot" >
                    <span class="pull-left">#突然开心#</span>
                    <span class="pull-right item_num">1.1亿</span>
                </div>
                <hr style="margin: 0;padding: 0;width: 100%">

                <div class="col-sm-12 text-center" style="padding: 10px"><a href="#">查看更多</a></div>



            </div>

        </div>
    </div>


</div>
<script src="{{ asset('home/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{asset('layer/layer.js')}}"></script>
<script type="text/javascript">
    //  获取div 中的内容
         $("#send").on('click',function(){
             var content = $("#content").html();
             var p = $("#message_thumb").val();
             var mydate = new Date(); // 获取年
             var y = mydate.getFullYear();  // 获取月
             var m = mydate.getMonth()+1;   // 获取日
             var d = mydate.getDate();      // 获取小时
             var h = mydate.getHours();     // 获取分钟
             var mm = mydate.getMinutes();  // 获取秒
             var s = mydate.getSeconds();
             if(h<10)
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
             $.ajax({
                type:"POST",
                url:'{{ url ("home/message") }}',
                data:{ "_token":"{{ csrf_token() }}","messages_content":content,"messages_picture":p,"messages_time":str,"user_id":{{ session ('users.user_id')}} },
                success:function(data){
//                    alert(data);
                    console.log(data);
                    if(data.error == 0){
                        //console.log("错误号"+res.error);
                        //console.log("错误信息"+res.msg);
                        layer.msg(data.msg, {icon: 5});
                       location.href = location.href;
                        var t =setTimeout("location.href = location.href;",1000);
                    }else{
                        layer.msg(data.msg, {icon: 6});
                        var t =setTimeout("location.href = location.href;",1000);
                        location.href = location.href;
                    }
             }
             });
             $("#content").html()="";
         });

    $(function(){

        $("#content").keyup(function(){

            //判断输入的字符串长度
            var content_len = $("#content").text().replace(/\s/g,"").length;

            $(".tips").text("已经输入"+content_len+"个字");

            if(content_len==0){
                // alert(content);
                $(".tips").text("");
                $("#send").addClass("disabled");
                return false;
            }else{
                $("#send").removeClass("disabled");
            }
        });

        $(".pic").click(function(){

            $(".select_Img").click();
        })


        //添加表情包1
        for (var i = 1; i < 60; i++) {

            $(".emoji_1").append("<img src="+"{{ asset('home/images/mywb/f') }}"+ i + ".png style='width:35px;height:35px' >");
        }
        //添加表情包2
        for (var i = 1; i < 61; i++) {

            $(".emoji_2").append("<img src="+"{{ asset('home/images/mywb/h') }}"+i+".png style='width:35px;height:35px' >");
        }


        $(".emoji").click(function(){

            $(".myEmoji").show();

            //点击空白处隐藏表情弹出层
            $(document).click(function (e) {

                if (!$("#edit_form").is(e.target) && $("#edit_form").has(e.target).length === 0) {

                    $(".myEmoji").hide();
                }
            });


        });
        //将表情添加到输入框
        $(".myEmoji img").each(function(){
            $(this).click(function(){
                var url = $(this)[0].src;
                $('#content').append("<img src='"+ url +"' style='width:25px;height:25px' >");
                $("#send").removeClass("disabled");
            })
        })

        //放大或缩小预览图片
        $(".mypic").click(function(){
            var oWidth=$(this).width(); //取得图片的实际宽度
            var oHeight=$(this).height(); //取得图片的实际高度

            if($(this).height()!=200){
                $(this).height(200);
            }else{
                $(this).height(oHeight + 200/oWidth*oHeight);
            }
        });
    });
    function delmessage(id) {
        //询问框
        layer.confirm('您确认删除吗？', {
            btn: ['确认','取消'] //按钮
        }, function(){
//                如果用户发出删除请求，应该使用ajax向服务器发送删除请求
//                $.get("请求服务器的路径","携带的参数", 获取执行成功后的额返回数据);
            //admin/user/1
            $.post("{{ url('home/message')}}/"+id,{"_method":"delete","_token":"{{ csrf_token() }}"},function(data){
//                    alert(data);
//                    data是json格式的字符串，在js中如何将一个json字符串变成json对象
                //var res =  JSON.parse(data);
//                    删除成功
                if(data.error == 0){
                    //console.log("错误号"+res.error);
                    //console.log("错误信息"+res.msg);
                    layer.msg(data.msg, {icon: 6});
//                       location.href = location.href;
                    var t=setTimeout("location.href = location.href;",1000);
                }else{
                    layer.msg(data.msg, {icon: 5});

                    var t=setTimeout("location.href = location.href;",1000);
                    //location.href = location.href;
                }

            });
        }, function(){

        });
    }
</script>
</body>
</html>