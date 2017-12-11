@extends('layouts.admin')
@section('title')
	<title>后台首页</title>
	@endsection
@section('body')
	<!--头部 开始-->
	<div class="top_box">
		<div class="top_left">
			<div class="logo">后台管理模板</div>
			<ul>
				<li><a href="#" class="active">首页</a></li>
				
			</ul>
		</div>
		<div class="top_right">
			<ul>
				<li>管理员:{{session('user.admin_name')}}</li>
				<li><a href="{{url('admin/change')}}" target="main">修改密码</a></li>
				<li><a href="{{url('admin/logout')}}">退出</a></li>
			</ul>
		</div>
	</div>
	<!--头部 结束-->

	<!--左侧导航 开始-->
	<div class="menu_box">
		<ul>
            <li>
            	<h3><i class="fa fa-fw fa-clipboard"></i>用户模块</h3>
                <ul class="sub_menu">
                    <li><a href="{{url('admin/user/create')}}" target="main"><i class="fa fa-fw fa-plus-square"></i>添加用户</a></li>
                    <li><a href="{{url('admin/user')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>用户列表</a></li>

                </ul>
            </li>
			<li>
				<h3><i class="fa fa-fw fa-clipboard"></i>新闻模块</h3>
				<ul class="sub_menu">
					<li><a href="{{url('admin/news/create')}}" target="main"><i class="fa fa-fw fa-plus-square"></i>添加新闻</a></li>
					<li><a href="{{url('admin/news')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>新闻列表</a></li>

				</ul>
			<li>
				<h3><i class="fa fa-fw fa-cog"></i>友情链接模块</h3>
				<ul class="sub_menu">
					<li><a href="{{url('admin/link/create')}}" target="main"><i class="fa fa-fw fa-cubes"></i>添加友情链接</a></li>
					<li><a href="{{url('admin/link')}}" target="main"><i class="fa fa-fw fa-database"></i>友情链接列表</a></li>
				</ul>
			</li>
			</li>
			<li>
				<h3><i class="fa fa-fw fa-clipboard"></i>网站配置模块</h3>
				<ul class="sub_menu">
					<li><a href="{{url('admin/config/create')}}" target="main"><i class="fa fa-fw fa-plus-square"></i>添加网站配置</a></li>
					<li><a href="{{url('admin/config')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>网站配置列表</a></li>

				</ul>
			</li>
			<li>
				<h3><i class="fa fa-fw fa-clipboard"></i>角色模块</h3>
				<ul class="sub_menu">
					<li><a href="{{url('admin/role/create')}}" target="main"><i class="fa fa-fw fa-plus-square"></i>添加角色</a></li>
					<li><a href="{{url('admin/role')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>角色列表</a></li>

				</ul>
			</li>
			<li>
				<h3><i class="fa fa-fw fa-clipboard"></i>权限模块</h3>
				<ul class="sub_menu">
					<li><a href="{{url('admin/permission/create')}}" target="main"><i class="fa fa-fw fa-plus-square"></i>添加权限</a></li>
					<li><a href="{{url('admin/permission')}}" target="main"><i class="fa fa-fw fa-list-ul"></i>权限列表</a></li>

				</ul>
			</li>
            <li>
            	<h3><i class="fa fa-fw fa-cog"></i>系统设置</h3>
                <ul class="sub_menu">
                    <li><a href="#" target="main"><i class="fa fa-fw fa-cubes"></i>网站配置</a></li>
                    <li><a href="#" target="main"><i class="fa fa-fw fa-database"></i>备份还原</a></li>
                </ul>
            </li>
            <li>
            	<h3><i class="fa fa-fw fa-thumb-tack"></i>工具导航</h3>
                <ul class="sub_menu">
                    <li><a href="http://www.yeahzan.com/fa/facss.html" target="main"><i class="fa fa-fw fa-font"></i>图标调用</a></li>
                    <li><a href="http://hemin.cn/jq/cheatsheet.html" target="main"><i class="fa fa-fw fa-chain"></i>Jquery手册</a></li>
                    <li><a href="http://tool.c7sky.com/webcolor/" target="main"><i class="fa fa-fw fa-tachometer"></i>配色板</a></li>
                    <li><a href="element.html" target="main"><i class="fa fa-fw fa-tags"></i>其他组件</a></li>
                </ul>
            </li>
        </ul>
	</div>
	<!--左侧导航 结束-->

	<!--主体部分 开始-->
	<div class="main_box">
		<iframe src="{{url('admin/info')}}" frameborder="0" width="100%" height="100%" name="main"></iframe>
	</div>
	<!--主体部分 结束-->

	<!--底部 开始-->
	<div class="bottom_box">
		CopyRight © 2015. Powered By <a href="http://www.itxdl.cn">http://www.itxdl.cn</a>.
	</div>
	<!--底部 结束-->
@endsection