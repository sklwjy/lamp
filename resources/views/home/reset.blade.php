@extends('layouts.admin')
@section('title')
	<title>后台登录页</title>
@endsection
@section('body')
	<div class="login_box">
		<h1>Blog</h1>
		<h2>重置密码</h2>
		<div class="form">
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




			{{--<p style="color:red">用户名错误</p>--}}
			<form action="{{url('doreset')}}" method="post">
				<ul>
					<li>
						{{csrf_field()}}

					<input type="text" name="user_email" value="{{$user_name}}" class="text"/>
						<span><i class="fa fa-user">请输入您要找回密码的账号</i></span>
					</li>
					<li>

						<input type="text" name="user_pass" value="" class="text"/>
						<span><i class="fa fa-user">请输入新密码</i></span>
					</li>
					<li>

						<input type="text" name="user_conpass" value="" class="text"/>
						<span><i class="fa fa-user">确认密码</i></span>
					</li>

					<li>
						<input type="submit" value="立即找回"/>
					</li>
				</ul>
			</form>
			<p><a href="#">返回首页</a> &copy; 2016 Powered by <a href="http://www.itxdl.cn" target="_blank">http://www.itxdl.cn</a></p>
		</div>
	</div>

@endsection