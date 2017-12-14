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


    </div>
    <!--结果页快捷搜索框 结束-->

    <!--搜索结果页面 列表 开始-->
    <form action="{{url('admin/news')}}" method="get">
        <div class="result_wrap">
            <!--快捷导航 开始-->
            <div class="result_content">
                <div class="short_wrap">
                    <div class="alert alert-danger">
                      
            <table class="search_tab">
            {{ csrf_field() }}
                <tr>
                    <th style="width:100px;"></th>
                    
                    <th width="70">用户名:</th>
                    <td><input type="text" name="keywords1" value="" placeholder="用户名"></td>
                    {{--<th width="70">邮箱:</th>--}}
                    {{--<td><input type="text" name="keywords2" value="" placeholder="邮箱"></td>--}}
                    <td><input type="submit"  value="查询"></td>
                </tr>
            </table>
        </form>
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
                        <th class="tc" width="5%">ID</th>
                        <th>新闻名称</th>
                        <th>新闻标题</th>
                        <th>新闻内容</th>
                        <th>新闻分类</th>
                        <th>新闻图片</th>
                        <th>添加时间</th>
                        <th>操作</th>
                    </tr>


                    @foreach($news as $k=>$v)
                    <tr>
                        <td>
                            <a href="#">{{$v->news_id}}</a>
                        </td>
                        <td>{{$v->news_names}}</td>
                        <td>{{$v->news_title}}</td>
                        <td>{{$v->news_content}}</td>
                        <td>{{$v->news_classify}}</td>
                        <td><img style="width:80px;height:80px" src="{{$v->news_picture}}"></td>
                        <td>{{date('Y-m-d H:i:s', $v->news_time)}}</td>
                        <td>
                            <a href="{{url('admin/news/'.$v->news_id.'/edit')}}">修改</a>
                            
                            @if($v->news_pid == 0)
                            
                                <button disabled onlick="delNews({{$v->news_id}})">删除</button>
                            @else
                            
                              <button onclick="delNews({{$v->news_id}})">删除</button>

                            @endif

                        </td>
                    </tr>

                    @endforeach
    <style type="text/css">
        table{
   
            有定义了表格的布局算法为fixed，下面td的定义才能起作用。 */
        }
        td{
            width:100%;
            word-break:keep-all;/* 不换行 */
            white-space:nowrap;/* 不换行 */
            overflow:hidden;/* 内容超出宽度时隐藏超出部分的内容 */
            text-overflow:ellipsis;/* 当对象内文本溢出时显示省略标记(...) ；需与overflow:hidden;一起使用。*/
        }

    </style>
    <style type="text/css">
        /*表格固定布局*/
        table{table-layout: fixed;word-break: break-all; word-wrap: break-word; }
        .award-name{-o-text-overflow:ellipsis;text-overflow:ellipsis;overflow:hidden;white-space:nowrap;width:100%; //超出部分显示省略号}
        .award-name:hover {
            text-overflow:inherit;
            overflow: visible;
            white-space: pre-line;
        }
        /*超出表格部分隐藏鼠标移动上去时显示*/
    </style>

      

                

            </div>
        </div>


    <!--搜索结果页面 列表 结束-->

    <script>



        //排序
        function changeOrder(obj,cate_id){
            //获取当前需要排序的记录的ID,cate_id
            //获取当前记录的排序文本框中的值
            var news_order = $(obj).val();
            $.post("{{url('admin/cate/changeorder')}}",{'_token':"{{csrf_token()}}","cate_id":cate_id,"cate_order":cate_order},function(data){
                //如果排序成功，提示排序成功
                if(data.status == 0){

                    layer.msg(data.msg,{icon: 6});
                    location.href = location.href;
                }else{
                    //如果排序失败，提示排序失败
                    layer.msg(data.msg,{icon: 5});
                    location.href = location.href;
                }
            })

        }
        
        function delNews(id) {

           
            //询问框
            layer.confirm('您确认删除吗？', {
                btn: ['确认','取消'] //按钮
            }, function(){
//                如果用户发出删除请求，应该使用ajax向服务器发送删除请求
//                $.get("请求服务器的路径","携带的参数", 获取执行成功后的额返回数据);
                //admin/user/1
                $.post("{{url('admin/news')}}/"+id,{"_method":"delete","_token":"{{csrf_token()}}"},function(data){
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