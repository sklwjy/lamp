@extends('layouts.first')

@section('body')
     
        <div class="col-sm-6 col-xs-12 my_edit" id="weibo" >
           
      <!--  微博显示区 -->
            <div class="row item_msg" >
                @foreach($news as $m=>$n)
                <div class="col-sm-12 col-xs-12 message" onclick="info()">
                    <img src="{{ asset('home/images/mywb/icon.png') }}" class="col-sm-2 col-xs-2" style="border-radius: 50%">
                    <div class="col-sm-10 col-xs-10">
                        <span style="font-weight: bold;">{{$n->news_name}}</span>
                        <br>
                        <small class="date" style="color:#999">{{date('Y-m-d H:i:s', $n->news_time)}}</small>
                        <div class="msg_content">{!!$n->news_content!!}
                            <img class="mypic" src="{{$n->news_picture}}" >
                      
                        </div>


                    </div>

                </div>
                @endforeach
                


            </div>



        </div>


        <div class="col-sm-3 col-xs-12 part_right" >
            <div class="row text-center inform">
                <img src="{{ asset('home/images/mywb/icon.png') }}" >
                <h4 style="font-weight: bold;">{{session('users.user_name')}}</h4>
                <div class="col-sm-12 my_inform" >
                    <div class="col-sm-4 col-xs-4">
                        <div>111</div>
                        <div class="sort">关注</div>

                    </div>
                    <div class="col-sm-4 col-xs-4">
                        <div>111</div>
                        <div class="sort">粉丝</div>
                    </div>
                    <div class="col-sm-4 col-xs-4">
                        <div>111</div>
                        <div class="sort">博客</div>
                    </div>
                </div>
            </div>
            <div class="row part_hot" >
                <div class="col-sm-12">
                    <span class="pull-left" style="padding: 10px;font-size:16px;font-weight: bold;">热门话题</span>
                    <span class="pull-right" style="padding: 10px;">换话题</span>
                </div>
                <hr style="margin: 0;padding: 0;width: 100%">

                <div class="col-sm-12 item_hot" >
                    <span class="pull-left">#英雄联盟s7#</span>
                    <span class="pull-right item_num">34.6亿</span>
                </div>

                <div class="col-sm-12 item_hot" >
                    <span class="pull-left">#今天霜降#</span>
                    <span class="pull-right item_num">2.6亿</span>
                </div>

                <div class="col-sm-12 item_hot" >
                    <span class="pull-left">#亚洲新歌榜#</span>
                    <span class="pull-right item_num">10.4亿</span>
                </div>

                <div class="col-sm-12 item_hot" >
                    <span class="pull-left">#扑通扑通少女心#</span>
                    <span class="pull-right item_num">1.5亿</span>
                </div>

                <div class="col-sm-12 item_hot" >
                    <span class="pull-left">#突然开心#</span>
                    <span class="pull-right item_num">1.1亿</span>
                </div>
                <hr style="margin: 0;padding: 0;width: 100%">

                <div class="col-sm-12 text-center" style="padding: 10px"><a href="#">查看更多</a></div>



            </div>

        </div>
@endsection