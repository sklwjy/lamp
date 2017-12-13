@extends('layouts.first')

@section('body')
        <div class="col-sm-6 col-xs-12 my_edit" id="weibo" >
           
        
            
           

      <!--  微博显示区 -->
            <div class="row item_msg" >
                @foreach($news as $m=>$n)
                <div class="col-sm-12 col-xs-12 message" onclick="info({{$n->news_id}})">
                    <img src="{{ asset('home/images/mywb/icon.png') }}" class="col-sm-2 col-xs-2" style="border-radius: 50%">
                    <div class="col-sm-10 col-xs-10">
                        <span style="font-weight: bold;">{{$n->news_name}}</span>
                        <br>
                        <small class="date" style="color:#999">{{date('Y-m-d H:i:s', $n->news_time)}}</small>
                        <div class="msg_content">  <?php  
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
<script type="text/javascript">

    // function info(id)
    // {
    //     alert(111);
    //     $.ajax({
    //         type:'GET',
    //         url:"{{url('home/info')}}",
    //         data:id,
    //         success:function(data){
    //             alert(111);
    //         },
    //     });
    // }

    function info(id)
    {
        window.location.href="{{url('home/info')}}?id="+id;
    }

</script>


       