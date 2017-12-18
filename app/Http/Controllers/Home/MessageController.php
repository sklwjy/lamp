<?php

namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;
use App\Model\home\Message;
use App\Model\home\Users;
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
