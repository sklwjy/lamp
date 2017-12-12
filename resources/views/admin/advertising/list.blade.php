@extends('layouts.admin')
@section('title')
    <title>后台用户添加页面</title>
@endsection
@section('body')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="#">首页</a> &raquo; <a href="#">用户列表</a>
    </div>
    <!--面包屑导航 结束-->

	<!--结果页快捷搜索框 开始-->
	<div class="search_wrap">


        <form action="{{url('admin/advertising')}}" method="get">
            <table class="search_tab">
                <tr>
                    <th style="width:100px;"></th>
                    {{--<th>--}}
                        {{--每页条数：--}}
                        {{--<select name="num">--}}
                            {{--<option value="1"--}}
                                    {{--@if($request['num'] == 1)  selected  @endif--}}
                            {{-->--}}
                            {{--</option>--}}
                            {{--<option value="2"--}}
                                    {{--@if($request['num'] == 2)  selected  @endif--}}
                            {{-->--}}
                            {{--</option>--}}
                        {{--</select>--}}
                    {{--</th>--}}
                    <th width="70">关键字:</th>
                    <td><input type="text" name="keywords" value="" placeholder="关键字"></td>

                    <td><input type="submit"  value="查询"></td>
                </tr>
            </table>
        </form>
    </div>
    <!--结果页快捷搜索框 结束-->

    <!--搜索结果页面 列表 开始-->
    <form action="#" method="post">
        <div class="result_wrap">
            <!--快捷导航 开始-->
            <div class="result_content">
                <div class="short_wrap">
                    <div class="alert alert-danger">
                        <ul>
                            @if(session('msg'))
                                <li style="color:red">{{session('msg')}}</li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
            <!--快捷导航 结束-->
        </div>

        <div class="result_wrap">
            <div class="result_content">
                <table class="list_tab">
                    <tr>
                        <th class="tc">ID</th>
                        <th class="tc">广告名称</th>
                        <th class="tc">地址</th>
                        <th class="tc">缩略图</th>
                        <th class="tc">修改</th>

                    </tr>

                @foreach($advertisings as $k => $v)
                    <tr>
                        <td>{{$v->advertising_id}}</td>
                        <td>{{$v->advertising_name}}</td>
                        <td>{{$v->advertising_url}}</td>
                        <td><img style="width:100px" src="{{$v->advertising_picture}}" alt=""></td>

                        <td>

                                <a href = "{{url('admin/advertising/'.$v -> advertising_id.'/edit')}}">修改</a>
                                <a href = "javascript:;" onclick="userDel({{$v -> advertising_id}})">删除</a>

                        </td>
                    </tr>
                @endforeach

                </table>
                <style>
                    table{table-layout: fixed;word-break: break-all; word-wrap: break-word; //表格固定布局}

                    .award-name{-o-text-overflow:ellipsis;text-overflow:ellipsis;overflow:hidden;white-space:nowrap;width:100%; //超出部分显示省略号}

                </style>




                <style>
                    .page_list ul li span{
                        padding:6px 12px;
                    }
                </style>
            </div>
        </div>
    </form>
    <!--搜索结果页面 列表 结束-->

    <script>

        function userDel(id) {

            //询问框
            layer.confirm('您确认删除吗？', {
                btn: ['确认','取消'] //按钮
            }, function(){
//                如果用户发出删除请求，应该使用ajax向服务器发送删除请求
//                $.get("请求服务器的路径","携带的参数", 获取执行成功后的额返回数据);
                //admin/user/1
                $.post("{{url('admin/advertising')}}/"+id,{"_method":"delete","_token":"{{csrf_token()}}"},function(data){
                    //alert(data);
//                    data是json格式的字符串，在js中如何将一个json字符串变成json对象
                   //var res =  JSON.parse(data);
//                    删除成功
                   if(data.error == 0){
                       //console.log("错误号"+res.error);
                       //console.log("错误信息"+res.msg);
                       layer.msg(data.msg, {icon: 6});
//                       location.href = location.href;
                       var t=setTimeout("location.href = location.href;",2000);
                   }else{
                       layer.msg(data.msg, {icon: 5});

                       var t=setTimeout("location.href = location.href;",2000);
                       //location.href = location.href;
                   }


                });


            }, function(){

            });
        }





    </script>
@endsection