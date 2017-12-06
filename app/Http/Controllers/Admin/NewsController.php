<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Model\admin\News;



/**
 * @ 对新闻的操作
 * 
 */
class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index(Request $request)
    {
//        $request->all()
//        $request->all()
        // $news = News::orderBy('news_id','asc')
        //     ->where(function($query) use($request){
        //         //检测关键字
        //         $newsname = $request->input('keywords1');
        //         // dd($newsname);
        //         //$email = $request->input('keywords2');
        //         //如果用户名不为空
        //         if(!empty($newsname)) {
        //             $query->where('news_name','like','%'.$newsname.'%');
        //         }

        //     });
        //     ->paginate($request->input('num', 2));
        

        $news = (new News())->tree();
        // dd($news);

            
        return view('admin.news.list',['news'=>$news, 'request'=> $request]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 返回一级分类
        $newsOne = News::where('news_pid', 0)->get();
        // dd($news);
        return view('admin/news/add', compact('newsOne'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $news = Input::except('_token');
        // dd($news);

        // 表单验证
        $rule = [
            'news_name'=>'required',
            'news_title'=>'required',
            'news_content'=>'required',
            'news_classify'=>'required',
        ];

        $mess = [
            'news_name.required'=>'新闻标题必须填写',
            'news_title.required'=>'新闻标题必须填写',
            'news_content.required'=>'新闻内容必须填写',
            'news_classify.required'=>'新闻分类必须填写',
        ];

        $validator =  Validator::make($news,$rule,$mess);
        //如果表单验证失败 passes()
        if ($validator->fails()) {
            return redirect('admin/news/create')
                ->withErrors($validator)
                ->withInput();
        }


        // 3执行添加操作
        $news['news_time'] = date('Y-m-d H:i:s');
        // dd($news);
        $res = News::create($news);
        
        // $new = new News();
        // $new->news_name = $news['news_name'];
        // $new->news_title = $news['news_title'];
        // $new->news_content = $news['news_content'];
        // $new->news_classify = $news['news_classify'];
        // $new->news_time = $news['news_time'];
        // $new->news_pid = $news['news_pid'];
        // $res = $new->save();

        if($res){
            return redirect('admin/news')->with('msg', '添加成功');
        }else{
            return redirect('admin/news/create')->with('msg', '添加失败');
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
        // 1 更具传过来的ID获取要修改的信息
        $news = News::find($id);
        // dd($news);
        
        // 2 返回修改页面(记得带上需要修改的信息)
        return view('admin.news.edit', compact('news'));
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
        // 通过id找到要修改的用户
        $news = News::find($id);
        // dd($news);

        // 通过$request获取要修改的值
        $input = $request->except('_token', '_method');
        // dd($input);
        
        // 3 使用模型的update方法进行更新
        $res = $news->update($input);
        

        if($res){
            return redirect('admin/news')->with('msg', '修改成功');
        }else{
            return redirect('admin/news'.$news->news_id.'edit')->with('msg', '修改失败');
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
        $res = News::find($id)->delete();
        // dd($res);
        
        $data = [];

        if($res){
            $data['error'] = 0;
            $data['msg'] = '删除成功';
        }else{
            $data['error'] = 1;
            $data['msg'] = '删除失败';
        }

        return $data;
    }

    /**
     *  处理客户端传过来的文件(图片)
     * @return 是否把文件放在指定的位置
     */
    public function upload(Request $request)
    {
        // 获取客户端传过来的文件
        $file = $request->file('file_upload');
        // $file = $request->all();
        // dd($file);

        if($file->isValid()){
            // 获取文件上传对象的后缀名
            $ext = $file->getClientOriginalExtension();

            // 生成一个唯一的文件名, 保证所有文件不重名
            $newfile = time().rand(1000, 9999).uniqid().'.'.$ext;

            // 设置上传文件的目录
            // $dirpath = public_path().'/uploads/';

            // 将文件移动到本地服务器的指定位置,并以新文件名命名
            // $file->move(移动到的目录, 新文件名);
            // $file->move($dirpath, $newfile);


            // 将文件移动到七牛云, 并以新文件名命名
            \Storage::disk('qiniu')->writeStream('uploads/'.$newfile, fopen($file->getRealPath(), 'r'));



            // 将上传的图片名称返回到前台, 目的是前天显示图片
            return $newfile;
        }
    }
}
