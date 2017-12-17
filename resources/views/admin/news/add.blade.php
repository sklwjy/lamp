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
        <form id="news_form" action="{{url('admin/news')}}" method="post" enctype="multipart/form-data">
            <table class="add_tab">
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
                {{csrf_field()}}
                <tbody>
               <tr>
                    <th width="120"><i class="require">*</i>父级分类：</th>
                    <td>
                        <select name="news_pid">
                            <option value="0">==顶级分类==</option>
                           @foreach($newsOne as $k=>$v)
                            <option value="{{$v->news_id}}">{{$v->news_name}}</option>
                           @endforeach
                        </select>
                    </td>
                <tr>
                    <th><i class="require">*</i>新闻名称：</th>
                    <td>
                        <input type="text" name="news_name">
                        <span><i class="fa fa-exclamation-circle yellow"></i>新闻名称必须填写</span>
                    </td>
                </tr>
                <tr>
                    <th>新闻标题：</th>
                    <td>
                        <input type="text" class="lg" name="news_title">
                    </td>
                </tr>    
                <tr>
                        <th>新闻内容：</th>
                        <td>
                            <script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.config.js"></script>
                            <script type="text/javascript" charset="utf-8" src="/ueditor/ueditor.all.min.js"> </script>
                            <!--建议手动加在语言，避免在ie下有时因为加载语言失败导致编辑器加载失败-->
                            <!--这里加载的语言文件会覆盖你在配置项目里添加的语言类型，比如你在配置项目里配置的是英文，这里加载的中文，那最后就是中文-->
                            <script type="text/javascript" charset="utf-8" src="/ueditor/lang/zh-cn/zh-cn.js"></script>

                            <script id="editor" name="news_content" type="text/plain" style="width:800px;height:300px;"></script>
                            <script>
                                var ue = UE.getEditor('editor');
                            </script>
                            <style>
                                .edui-default{line-height: 28px;}
                                div.edui-combox-body,div.edui-button-body,div.edui-splitbutton-body
                                {overflow: hidden; height:20px;}
                                div.edui-box{overflow: hidden; height:22px;}
                            </style>
                        </td>
                    </tr>
                <tr>
                        <th>缩略图:</th>
                        <td>
                            <input type="text" size="50" id="art_thumb" name="news_picture">
                            <input id="file_upload" name="file_upload[]" type="file" multiple="true" >
                            <br>
                            <img src="" id="img1" alt="" style="width:80px;height:80px">
                           
                           <script type="text/javascript">
                                $(function () {
                                    $("#file_upload").change(function () {
                                        $('img1').show();
                                        uploadImage();
                                    });
                                });
                                function uploadImage() {
                                    // 判断是否有选择上传文件
                                    var imgPath = $("#file_upload").val();
                                    if (imgPath == "") {
                                        alert("请选择上传图片！");
                                        return;
                                    }
                                    //判断上传文件的后缀名
                                    var strExtension = imgPath.substr(imgPath.lastIndexOf('.') + 1);
                                    if (strExtension != 'jpeg' && strExtension != 'gif'
                                        && strExtension != 'png' && strExtension != 'bmp' && strExtension != 'jpg') {
                                        alert("请选择图片文件");
                                        return;
                                    }
                                    // var formData = new FormData($('#art_form')[0]); // 这里必须是以数组的形式传过去的
                                    var formData = new FormData();
                                    formData.append('file_upload', $('#file_upload')[0].files[0]);
                                    formData.append('_token',"{{csrf_token()}}");
                                     $.ajax({
                                        type: "POST",
                                        url: "/admin/upload",
                                        data: formData,
                                        async: true,
                                        cache: false,
                                        contentType: false,
                                        processData: false,
                                        success: function(data) {
                                              $('#img1').attr('src','/uploads/'+data);
//                                             $('#img1').attr('src', 'http://p0dwlzk2l.bkt.clouddn.com/uploads/'+data);
                                            $('#img1').show();
                                            $('#art_thumb').val('/uploads/'+data);
                                        },
                                        error: function(XMLHttpRequest, textStatus, errorThrown) {
                                            alert("上传失败，请检查网络后重试");
                                        }
                                    });
                                   
                                }
                            </script>
                        </td>
                </tr>
                <tr>
                    <th><i class="require">*</i>新闻分类：</th>
                    <td>
                        <input type="text" class="sm" name="news_classify">
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