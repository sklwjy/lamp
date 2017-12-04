@extends('layouts.admin')
@section('title')
    <title>后台用户添加页面</title>
@endsection
@section('body')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="#">首页</a> &raquo; <a href="#">商品管理</a> &raquo; 添加商品
    </div>
    <!--面包屑导航 结束-->

	<!--结果页快捷搜索框 开始-->
	<div class="search_wrap">
        {{--<form action="{{url('admin/user')}}" method="get">--}}
            {{--<table class="search_tab">--}}
                {{--<tr>--}}
                    {{--<th width="120">选择分类:</th>--}}
                    {{--<td>--}}
                        {{--<select onchange="javascript:location.href=this.value;">--}}
                            {{--<option value="">全部</option>--}}
                            {{--<option value="http://www.baidu.com">百度</option>--}}
                            {{--<option value="http://www.sina.com">新浪</option>--}}
                        {{--</select>--}}
                    {{--</td>--}}
                    {{--<th width="70">关键字:</th>--}}
                    {{--<td><input type="text" value="{{@$input}}" name="keywords" placeholder="关键字"></td>--}}
                    {{--<td><input type="submit" name="sub" value="查询"></td>--}}
                {{--</tr>--}}
            {{--</table>--}}
        {{--</form>--}}



        {{--多条件--}}

        <form action="{{url('admin/user')}}" method="get">
            <table class="search_tab">
                <tr>
                    <th style="width:100px;"></th>
                    <th>
                        每页条数：
                        <select name="num">
                            <option value="1"
                                    @if($request['num'] == 1)  selected  @endif
                            >1
                            </option>
                            <option value="2"
                                    @if($request['num'] == 2)  selected  @endif
                            >2
                            </option>
                        </select>
                    </th>
                    <th width="70">用户名:</th>
                    <td><input type="text" name="keywords1" value="{{$request->keywords1}}" placeholder="用户名"></td>
                    {{--<th width="70">邮箱:</th>--}}
                    {{--<td><input type="text" name="keywords2" value="{{$request->keywords2}}" placeholder="邮箱"></td>--}}
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
                        <th class="tc">用户名</th>
                        <th class="tc">密码</th>
                        <th class="tc">操作</th>
                    </tr>

            @foreach($user as $k=>$v)
                    <tr>
                        <td class="tc">{{$v->user_id}}</td>
                        <td class="tc">{{$v->user_name}}</td>
                        <td class="tc award-name">{{$v->user_pass}}</td>
                        <td>
                            <a href="{{url('admin/user/'.$v->user_id.'/edit')}}">修改</a>
                            <a href="javascript:;" onclick="userDel({{$v->user_id}})">删除</a>
                        </td>
                    </tr>
             @endforeach

                </table>
                <style>
                    table{table-layout: fixed;word-break: break-all; word-wrap: break-word; //表格固定布局}

                    .award-name{-o-text-overflow:ellipsis;text-overflow:ellipsis;overflow:hidden;white-space:nowrap;width:100%; //超出部分显示省略号}

                </style>





                {{--分页--}}
                {{--<div class="page_list">--}}
                   <?php
                        $v = empty($input) ? '' : $input;
                    ?>
                    {{--{!! $users->appends(['keywords'=>$v])->render() !!}--}}
                {{--</div>--}}



                <div class="page_list">

                    {{--appends(['keyword1'=>'a','keyword2'=>'aaa@q163.com','num'=>2])--}}
                    {!! $user->appends($request->all())->render() !!}
                </div>

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
                $.post("{{url('admin/user')}}/"+id,{"_method":"delete","_token":"{{csrf_token()}}"},function(data){
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