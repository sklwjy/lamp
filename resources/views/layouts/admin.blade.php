<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    @yield('title')
    <link rel="stylesheet" href="{{asset('admin/style/css/ch-ui.admin.css')}}">
    <link rel="stylesheet" href="{{asset('admin/style/font/css/font-awesome.min.css')}}">
    <script type="text/javascript" src="{{asset('admin/style/js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('admin/style/js/ch-ui.admin.js')}}"></script>
    <script type="text/javascript" src="{{asset('layer/layer.js')}}"></script>
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
</head>
<body style="background:#F3F3F4;">
@section('body')
@show
</body>
</html>