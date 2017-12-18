<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=0.5, maximum-scale=2.0, user-scalable=yes" />
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="format-detection" content="telephone=no" />
    <title>微博</title>
    <link rel="stylesheet" type="text/css" href="https://img.t.sinajs.cn/t6/style/css/module/list/comb_WB_feed_profile.css?version=d734c0d1947e41c8">
    <link rel="stylesheet" type="text/css" href="https://img.t.sinajs.cn/t6/style/css/module/list/comb_WB_feed_profile.css?version=d734c0d1947e41c8">
    <link rel="stylesheet" type="text/css" href="https://img.t.sinajs.cn/t6/skin/skin048/skin.css?version=d734c0d1947e41c8">
    <link rel="stylesheet" type="text/css" href="https://img.t.sinajs.cn/t6/style/css/module/base/frame.css?version=d734c0d1947e41c8">
    <link rel="stylesheet" href="{{ asset('home/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('home/css/style2.css') }}">
    <link rel="stylesheet" href="{{ asset('home/css/style1.css') }}" media="screen" type="text/css" />

</head>
<body>
<nav class="navbar  navbar-fixed-top" role="navigation" style="background: #e0620d ;padding-top: 3px;height:50px;">
    <div class="container-fluid" style="background: #fff;">
        <div class="navbar-header ">
            <span class="navbar-brand " href="#">WEIBO</span>

            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#my-navbar-collapse">
                <span class="sr-only">切换导航</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
         <form action="{{url('home/index')}}" class="navbar-form navbar-left" role="search">
            <div class="form-group">
                <input type="text" name="news_name" class="form-control" placeholder="#热门话题#">
                <label for="tijiao"><i class="glyphicon glyphicon-search btn_search" ></i></label>
                 <button id="tijiao" style="display:none" type="submit" class="btn btn-default"></button>
            </div>

        </form>

        <div class="collapse navbar-collapse" id="my-navbar-collapse">

            <ul class="nav navbar-nav navbar-right" >

                <li>
                    <a  href="{{url('home/index')}}"><i class="glyphicon glyphicon-home">首页</i>
                        </a>
                </li>
                <li ><a href="{{url('emailregister')}}"><i class="glyphicon glyphicon-user"></i>&nbsp;&nbsp;请登录</a></li>
                
                    
                </li>
            </ul>

        </div>


    </div>
    <hr style="margin: 0;padding: 0;color:#222;width:100%">
</nav>

<div class="container container_bg" >
    <div class="row">
        <div class="col-sm-2" style="margin-top:70px; ">
            <div style="position:fixed;z-index:9999" class="container; ">
                <nav>
                    <ul class="mcd-menu" style="width:185px;height:0px">                   
                        <li> <a href="{{url('home/index')}}"> <i class="fa fa-home"></i> <strong>首页</strong> </a> </li>

                  
                    @foreach($navs as $k=>$v)
                        <li> <a href="{{url('home/list')}}?news_id={{$v->news_id}}"> <i class="fa fa-home"></i> <strong>{{$v->nav_name}}</strong> </a> </li>
                    @endforeach  
                    </ul>
                </nav>
            </div>
        </div>
       
    <div class="col-sm-6 col-xs-12 my_edit" id="weibo" >
           
      <!--  微博显示区 -->

               

            <div class="row item_msg" >
              
                <div class="col-sm-12 col-xs-12 message" onclick="info()">
                    <img src="{{ asset('home/images/mywb/icon.png') }}" class="col-sm-2 col-xs-2" style="border-radius: 50%">
                    <div class="col-sm-10 col-xs-10">
                        <span style="font-weight: bold;">{{$news->news_name}}</span>
                        <br>
                        <small class="date" style="color:#999">{{date('Y-m-d H:i:s', $news->news_time)}}</small>
                        <div class="msg_content">{!!$news->news_content!!}
                            <img class="mypic" src="{{$news->news_picture}}" >
                      
                        </div>


                    </div>

                </div>
         
                


            </div>



        </div>



      <div class="col-sm-3 col-xs-12 part_right" style="position: fixed;top:0px;right:100px">
            <div class="row text-center inform">
                <iframe allowtransparency="true" frameborder="0" width="305" height="201" scrolling="no" src="//tianqi.2345.com/plugin/widget/index.htm?s=1&z=1&t=1&v=0&d=2&bd=0&k=&f=&ltf=009944&htf=cc0000&q=1&e=1&a=1&c=54511&w=305&h=201&align=center"></iframe>
            </div>


            <div class="row part_hot" >
                <div class="col-sm-12">
                    <span class="pull-left" style="padding: 10px;font-size:16px;font-weight: bold;">热门话题</span>
                    
                </div>
                <hr style="margin: 0;padding: 0;width: 100%">
                
                @foreach($order as $q=>$o)
                <div class="col-sm-12 item_hot" >
                    <span class="pull-left"><a href="{{url('home/info')}}?id={{$o->news_id}}">{{$o->news_name}}</a></span>
                    <span class="pull-right item_num">{{$o->news_view}}次</span>
                </div>
                @endforeach
                
                <hr style="margin: 0;padding: 0;width: 100%">

               

            </div>

        </div>
    </div>


</div>
<!-- JiaThis Button BEGIN -->
<script type="text/javascript" src="http://v3.jiathis.com/code/jiathis_r.js?move=0" charset="utf-8"></script>
<!-- JiaThis Button END -->
</body>
</html>



           
        
            
           
