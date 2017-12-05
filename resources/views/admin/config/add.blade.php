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
        <form action="{{url('admin/config')}}" method="post">
            <table class="add_tab">
                <tbody>
                <tr>
                    {{csrf_field()}}
                    <th><i class="require">*</i>标题：</th>
                    <td>
                        <input type="text" name="conf_title" value="{{config('webconfig.web_title')}}">
                        <span><i class="fa fa-exclamation-circle yellow"></i>配置项标题必须填写</span>
                    </td>
                </tr>
                <tr>
                    <th><i class="require">*</i>名称：</th>
                    <td>
                        <input type="text" name="conf_name">
                        <span><i class="fa fa-exclamation-circle yellow"></i>配置项名称必须填写</span>
                    </td>
                </tr>
                <tr>
                    <th>类型：</th>
                    <td>
                        <input type="radio" name="field_type" value="input" checked onclick="showTr(this)">input　
                        <input type="radio" name="field_type" value="textarea" onclick="showTr(this)">textarea　
                        <input type="radio" name="field_type" value="radio" onclick="showTr(this)">radio
                    </td>
                </tr>
                <tr class="field_value" style="display: none">
                    <th>类型值：</th>
                    <td>
                        <input type="text" class="lg" name="field_value">
                        <p><i class="fa fa-exclamation-circle yellow"></i>类型值只有在radio的情况下才需要配置，格式 1|开启,0|关闭</p>
                    </td>
                </tr>
                <tr>
                    <th>排序：</th>
                    <td>
                        <input type="text" class="sm" name="conf_order" value="0">
                    </td>
                </tr>
                <tr>
                    <th>说明：</th>
                    <td>
                        <textarea id="" cols="30" rows="10" name="conf_tips"></textarea>
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