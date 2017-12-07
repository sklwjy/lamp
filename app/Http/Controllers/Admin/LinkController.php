<?php

namespace App\Http\Controllers\Admin;

use App\Model\admin\Link;
use App\Http\Requests;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function index()
//    {
// //        1获取友情链接数据
//        $links = Link::get();
////        2 显示视图
//        return view('admin.link.list',compact('links'));
//    }

    // 多条件带分页搜索查询
    public function index(Request $request)
    {
       // $request->all();
// dd(111);
//        return 222;
        $link =Link::orderBy('link_id','asc')
            ->where(function($query) use($request){
                //检测关键字
                $linkname = $request->input('keywords1');
                //$email = $request->input('keywords2');
                //如果用户名不为空
//                dd($linkname);
                if(!empty($linkname)) {
                    $query->where('link_name','like','%'.$linkname.'%');
                }

            })
            ->paginate($request->input('num', 3));
        return view('admin.link.list',['link'=>$link, 'request'=> $request]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // return 11;
        return view('admin/link/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $input = $request->except('_token');
        $res = Link::create($input);
        //        4. 判断添加是否成功
        if($res){
            return redirect('admin/link')->with('success', '添加成功');
        }else{
            return back()->with('errors', '添加失败');
        }
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
        //1. 根据传过来的ID获取要修改的用户记录
        $link = Link::find($id);

//        2.返回修改页面（带上要修改的用户记录）
        return view('admin.link.edit',compact('link'));
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
        // //        1. 通过id找到要修改那个用户
        $link = Link::find($id);

//        2. 通过$request获取要修改的值

        $input = $request->except('_token','_method');
        //$input = $request->only('link_name');//数组
        //$input = $request->input('user_name');//字符串

//        dd($input);

//        3. 使用模型的update进行更新
//        $user->update(['user_name'=>'zhangsan']);
        $res = $link->update($input);

//        4. 根据更新是否成功，跳转页面
        if($res){
            return redirect('admin/link');
        }else{
            return redirect('admin/link/'.$link->link_id.'/edit');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//        echo $id;
//        return 11;
        //  ////        return $id;
        $res = Link::find($id)->delete();
        // dd($res);
        $data = [];
        if($res){
            $data['error'] = 0;
            $data['msg'] ="删除成功";
        }else{
            $data['error'] = 1;
            $data['msg'] ="删除失败";
        }

        // return  json_encode($data);

        return $data;
    }
}
