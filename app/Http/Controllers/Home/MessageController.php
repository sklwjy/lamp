<?php

namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;
use App\Model\home\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;


class MessageController extends Controller
{
    public function upl(Request $request)
    {
//        获取客户端传过来的文件
        $file = $request->file('file_upload');
//        $file = $file[0];
//        $file = $request->all();

//        $file = $request->all();

        if($file->isValid()){
            //        获取文件上传对象的后缀名
            $ext = $file->getClientOriginalExtension();
            //生成一个唯一的文件名，保证所有的文件不重名
            $newfile = time().rand(1000,9999).uniqid().'.'.$ext;
            //设置上传文件的目录
            $dirpath = public_path().'/uploads/';
            //将文件移动到本地服务器的指定的位置，并以新文件名命名
//            $file->move(移动到的目录, 新文件名);
            $file->move($dirpath, $newfile);

            return $newfile;
        }

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    // 判断当前的微博是否存在于redis中，如果在直接取 如果不在，先查数据库，将查到的数据放入redis中读取
        // 所有微博的ID
        $listkey = 'LIST:MESSAGE';
        // 每个微博的内容
        $hashkey = 'HASH:MESSAGE:';
        //如果redis中不存在，需要查询的微博信息
       if(!Redis::exists($listkey)){
//            查询数据库，得到需要的数据，放入redis
            $meages = Message::get()->toArray();
//            dd($meages);
           foreach($meages as $key => $value)
            {
//                //将所有微博的id写入$listkey变量
                Redis::rpush($listkey,$meages[$key]['messages_id']);
            }
//            //  获取所有微博的id作为遍历条件
            $meagesall = Redis::lrange($listkey, 0, -1);
            foreach($meagesall as $k=>$v){
//                //每次遍历向redis的$hashkey对应的变量中写入一个微博的信息
                Redis::hmset($hashkey.$v, $meages[$k]);
            }
//            //从Redis中获取需要的文章信息
//            //存放最终绑定到页面上的文章列表数据
            $messages = [];
            foreach($meagesall as $n)
            {
                $messages[] = Redis::hgetall($hashkey.$n);
            }
              return view( 'home/mywb',compact('messages'));
       }else{
//            //如果redis中已经存在了要获取的文章列表
            $meagesall = Redis::lrange($listkey,0,-1);
            $messages = [];
            foreach($meagesall as $n)
            {
                $messages[] = Redis::hgetall($hashkey.$n);
            }
            return view( 'home/mywb',compact('messages'));
       }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
   // 所有微博的ID
        $listkey = 'LIST:MESSAGE';
        // 每个微博的内容
        $hashkey = 'HASH:MESSAGE:';

        $input = $request->except('_token');
        $res = Message::create($input);

        if($res){

            Redis::del($listkey);
            Redis::del($hashkey.'*');

            $data =[
                'status'=> 0,
                'msg'=>'发布成功'
            ];
        }else{
            $data =[
                'status'=> 1,
                'msg'=>'发布失败'
            ];
        }
        return $data;

    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // 所有微博的ID
        $listkey = 'LIST:MESSAGE';
        // 每个微博的内容
        $hashkey = 'HASH:MESSAGE:';

        $res = Message::find($id)->delete();

//        dd($res);
        $data = [];
        if($res){

            Redis::del($listkey);
            Redis::del($hashkey.'*');

            $data['error'] = 0;
            $data['msg'] ="删除成功";
        }else{
            $data['error'] = 1;
            $data['msg'] ="删除失败";
        }
        return $data;;
    }


    // 微博详情页
    public function info()
    {
         
    }
}
