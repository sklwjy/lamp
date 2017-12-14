@extends('layouts.first')

@section('body')
     
     <div class="col-sm-6 col-xs-12 my_edit" id="weibo" >
           
      <!--  微博显示区 -->

               <div class="layui-carousel" id="cwx">
                   <div carousel-item>
                       @foreach($advertising as $x=>$y)
                       <div><a href="{{$y->advertising_url}}"><img style="width:590px" src="{{$y->advertising_picture}}" alt=""></a></div>
                       @endforeach
                   </div>
               </div>
               



            <div class="row item_msg" >
                @foreach($news as $m=>$n)
                <div class="col-sm-12 col-xs-12 message" onclick="info({{$n->news_id}})">
                    <img src="{{ asset('home/images/mywb/icon.png') }}" class="col-sm-2 col-xs-2" style="border-radius: 50%">
                    <div class="col-sm-10 col-xs-10">
                        <span style="font-weight: bold;">{{$n->news_name}}</span>
                        <br>
                        <small class="date" style="color:#999">{{date('Y-m-d H:i:s', $n->news_time)}}</small>
                        <div class="msg_content"><?php  
                            $str=strip_tags($n->news_content);
                            echo substr($str,0,400);
                            ?>
                            <img class="mypic" src="{{$n->news_picture}}" >
                      
                        </div>


                    </div>

                </div>
    @endforeach
                


            </div>



        </div>



@endsection

<script src="{{ asset('home/js/jquery-3.1.0.js') }}"></script>
<script src="{{ asset('home/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('layui/layui.js') }}"></script>


<script type="text/javascript">

      var p = 1;
      var isDown = false;

      $(window).on('scroll', function(){
        if(isDown) return ;

        run();
      });

      run();

      function run()
      {
        // 是否应该请求
        var vH = $(window).height();
        var sH = $(window).scrollTop();
        var dH = $(document).height();
        if(vH + sH >= dH)
        {
          //书写 ajax
          $.ajax({
            type:"POST",
            url: "{{url('home/pbl')}}",
            data: {p:p, '_token':'{{csrf_token()}}'},
            success:function(data){

              if(data.length <= 0)
              {
                isDown = true;
                return;
              }

              // 解析从服务器返回的数据
              for(var i in data)
              {
                var newItem = $('#item').clone();
                newItem.find('img').attr('src', data[i]['img']);
                newItem.find('h3').html(data[i]['title']);
                newItem.find('.price').html(data[i]['price']);
                newItem.find('.focus').html(data[i]['focus']);

                var index = i%4;
                $('ul').eq(index).append(newItem);
                newItem.show();
              }
            },
            error:function(){
              console.log('数据请求错误!  ');
            },
            dataType: 'json',

          });

          p++;
        }
        
      }
</script>


<script type="text/javascript">

    function info(id)
    {
        window.location.href="{{url('home/info')}}?id="+id;
    }

</script>

   


<script>
    // alert(111);
    layui.use('carousel', function(){
        var carousel = layui.carousel;
        //建造实例
        carousel.render({
            elem: '#cwx',
            width: '100%', //设置容器宽度
            arrow: 'always', //始终显示箭头
            anim: 'fade', //切换动画方式
        });
    });
</script>


