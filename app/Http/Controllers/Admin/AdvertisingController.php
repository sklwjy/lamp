<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\admin\Advertising;


class AdvertisingController extends Controller
{
    //处理广告图片
    public function upload(Request $request)
    {

            // 将上传的图片名称返回到前台, 目的是前天显示图片



        $file = $request->file('file_upload');
        if($file->isValid()){
            // 获取文件上传对象的后缀名
            $ext = $file->getClientOriginalExtension();

            // 生成一个唯一的文件名, 保证所有文件不重名
            $newfile = time().rand(1000, 9999).uniqid().'.'.$ext;

            // 设置上传文件的目录
            $dirpath = public_path().'/uploads/';

            // 将文件移动到本地服务器的指定位置,并以新文件名命名

            //$file->move(移动到的目录, 新文件名);
            $file->move($dirpath, $newfile);


            // 将文件移动到七牛云, 并以新文件名命名
            // \Storage::disk('qiniu')->writeStream('uploads/'.$newfile, fopen($file->getRealPath(), 'r'));


        return $newfile;
            // 将上传的图片名称返回到前台, 目的是前天显示图片

        }



    }

    public function index(Request $request)
    {
        // 获取用户的数据

        $advertisings = Advertising::get();

        return view('admin/advertising/list')->with('advertisings', $advertisings);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin/advertising/add');
    }

    public function store(Request $request)
    {
        //  1.获取用户和提交的表单数据
        $name = $request->request;
        foreach ($name as $v) {
            $arr[] = $v;
        }

        $advertising_name = $arr[1];
        $advertising_url = $arr[2];
        $advertising_picture = $arr[3];
        $brr['advertising_url'] = $arr[2];
        $brr['advertising_name'] = $arr[1];
        $brr['advertising_picture'] = $arr[3];
//
        $res = Advertising::create($brr);


        //  4.判断是否添加成功
        if ($res) {
            return redirect('admin/advertising')->with('msg', '添加成功');
        } else {
            return redirect('admin/advertising/create')->with('msg', '添加失败');
        }
        return view('admin/advertising/list');
    }


    public function edit($id)
    {
        // 1.根据传过来的ID,获取要修改的用户记录
        $advertisings = Advertising::find($id);
        // 2.返回修改页面(要修改的用户记录)

        return view('admin.advertising.edit', compact('advertisings'));
    }


    public function update(Request $request, $id)
    {
        //  1.通过id找到要修改的用户
        $advertisings = Advertising::find($id);
//        2.通过$request获取要修改的值
        $input = $request -> only('advertising_name');
//        3.使用模型的update进行更新
        $res = $advertisings->update($input);
//        4.根据更新是否成功,跳转页面
        if($res){
            return redirect('admin/advertising');
        }else{
            return redirect('admin/advertising/edit');
        }

    }


    public function destroy($id)
    {
        $res = Advertising::find($id)->delete();
        $data = [];
        if($res){
            $data['error'] = 0;
            $data['msg'] = "删除成功";
        }else{
            $data['error'] = 1;
            $data['msg'] = "删除失败";
        }

//        return json_encode($data);

        return $data;
    }
}
