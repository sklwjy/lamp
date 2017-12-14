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

	<!--结果集标题与导航组件 开始-->
	<div class="result_wrap">
        <div class="result_title">

                <div class="alert alert-danger">
                    <ul>
                       @if(session('msg'))
                            <li style="color:red">{{session('msg')}}</li>
                           @endif
                    </ul>
                </div>

        </div>
        <div class="result_content">
            <div class="short_wrap">
                <a href="#"><i class="fa fa-plus"></i>新增文章</a>
                <a href="#"><i class="fa fa-recycle"></i>批量删除</a>
                <a href="#"><i class="fa fa-refresh"></i>更新排序</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->
    
    <div class="result_wrap">
        <form action="{{url('admin/permission')}}" method="post">
            <table class="add_tab">
                <tbody>
                    <tr>
                        {{csrf_field()}}
                        <th><i class="require">*</i>权限名称：</th>
                        <td>
                            <input type="text" class="lg" name="name" value="">
                  
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>权限描述：</th>
                        <td>
                            <input type="text" class="lg" name="description">
                  
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>权限组号：</th>
                        <td>
                            <input type="text" class="lg" name="group_id">
                          
                        </td>
                    </tr>
                    <tr>
                        <th><i class="require">*</i>权限组名：</th>
                        <td>
                            <input type="text" class="lg" name="group_name">
                          
                        </td>
                    </tr>

                    <tr>
                        <th></th>
                        <td>
                            <input type="submit" value="提交">
                            <input type="button" class="back" onclick="history.go(-1)" value="返回">
                        </td>
                    </tr>
                </tbody>
            </table>
        </form>
    </div>
@endsection