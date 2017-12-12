@extends('layouts.admin')
@section('title')
    <title>后台广告修改页面</title>
@endsection
@section('body')
    <!--面包屑导航 开始-->
    <div class="crumb_warp">
        <!--<i class="fa fa-bell"></i> 欢迎使用登陆网站后台，建站的首选工具。-->
        <i class="fa fa-home"></i> <a href="#">首页</a> &raquo; <a href="#">广告修改</a>
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

    </div>
    <!--结果集标题与导航组件 结束-->
    
    <div class="result_wrap">
        <form action="{{url('admin/advertising/'.$advertisings->advertising_id)}}" method="post">
            <table class="add_tab">
                <tbody>
                    <tr>
                       {{--token认证--}}
                        {{csrf_field()}}
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                       {{--// 提交方式为put--}}
                        {{method_field('put')}}
                        <input type="hidden" name="_method" value="put">
                        <th><i class="require">*</i>广告名称：</th>
                        <td>
                            <input type="text" class="lg" name="advertising_name" value="{{$advertisings->advertising_name}}">
                            <p>标题可以写30个字</p>
                        </td>
                    </tr>

                    <tr>
                        {{--token认证--}}
                        {{csrf_field()}}
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        {{--// 提交方式为put--}}
                        {{method_field('put')}}
                        <input type="hidden" name="_method" value="put">
                        <th><i class="require">*</i>广告地址：</th>
                        <td>
                            <input type="text" class="lg" name="advertising_url" value="{{$advertisings->advertising_url}}">
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