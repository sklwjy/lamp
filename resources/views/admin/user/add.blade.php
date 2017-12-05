@extends('layouts.admin')
@section('title')
    <title>后台用户添加页面</title>
@endsection
@section('body')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="#">首页</a> &raquo; <a href="#">用户管理</a> &raquo; 添加用户
    </div>
    <!--面包屑导航 结束-->

	<!--结果集标题与导航组件 开始-->
	<div class="result_wrap">
        <div class="result_title">
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
        <form action="{{url('admin/user')}}" method="post">
            <table class="add_tab">
                <tbody>
                    <tr>
                        {{csrf_field()}}
                        <th><i class="require">*</i>用户名：</th>
                        <td>
                            <input type="text" class="lg" name="admin_name" value="{{old('admin_name')}}">
                            <p>标题可以写30个字</p>
                        </td>
                    </tr>
                    <tr>

                        <th><i class="require">*</i>密码：</th>
                        <td>
                            <input type="password" class="lg" name="admin_pass" value="{{old('admin_pass')}}">
                            <p>标题可以写30个字</p>
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