@extends('layouts.admin')
@section('title')
    <title>后台网站配置添加页面</title>
@endsection
@section('body')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="#">首页</a> &raquo; <a href="#">网站配置管理</a> &raquo; 添加网站配置
    </div>
    <!--面包屑导航 结束-->

	<!--结果集标题与导航组件 开始-->
	<div class="result_wrap">
        <div class="result_title">

                <div class="alert alert-danger">
                    <ul>
                       @if(session(' msg '))
                            <li style="color:red">{{ session('msg') }}</li>
                           @endif
                    </ul>
                </div>

        </div>
        <div class="result_content">
            <div class="short_wrap">
                <a href="#"><i class="fa fa-plus"></i>修改网站配置</a>
                <a href="#"><i class="fa fa-recycle"></i>批量删除</a>
                <a href="#"><i class="fa fa-refresh"></i>更新排序</a>
            </div>
        </div>
    </div>
    <!--结果集标题与导航组件 结束-->
    <div class="result_wrap">
        <form action="{{ url('admin/config/'.$config->conf_id) }}" method="post">
            <table class="add_tab">
                <tbody>
                {{--提交方式为put--}}
                {{csrf_field()}}

                {{ method_field('put') }}
                <tr>
                    <th><i class="require">*</i>标题：</th>
                    <td>
                        <input type="text" name="conf_title" value="{{ $config->conf_title }}">
                    </td>
                </tr>
                <tr>
                    <th><i class="require">*</i>名称：</th>
                    <td>
                        <input type="text" name="conf_name" value="{{  $config->conf_name }}">
                    </td>
                </tr>

                <tr>
                    <th>内容：</th>
                    <td>
                        {!! $config->conf_contents !!}
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
    <script>
        function showTr(obj){
            switch($(obj).val()){
                case 'input':
                    $('.field_value').hide();
                    break;
                case 'textarea':
                    $('.field_value').hide();
                    break;

                case 'radio':
                    $('.field_value').show();
            }

        }
    </script>
@endsection