<?php

namespace App\Http\Controllers\Admin;

use App\Model\admin\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;



class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 获取用户的数据

        $users = User::orderBy('admin_id','asc')->get();
       //将数据反水视图的三种方法
       // 1.return view('admin.user.list',['data'=>$users]);

        //2.return view('admin.user.list')->with('data',$users);

        //推荐compact



        //4.分页->paginate(每页的条数);
//        $users = Users::orderBy('user_id','asc')->paginate(5);
//

       // 搜索+分页
//        $users = User::orderBy('user_id','asc')->where('user_name','like','%'.$_GET['key'].%)->get();\
        $users = User::orderBy('admin_id','asc')->where(function($query) use($request){
            if(!empty($request->input('keywords'))){
                $query->where('admin_name','like','%'.$request->input('keywords').'%');
            }
        })->paginate(3);
        return view('admin.user.list',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin/user/add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //  1.获取用户和提交的表单数据
        $input = Input::except('_token');
    //dd($input);
     //   2.表单验证
        $rule = [
            'admin_name'=>'required|between:5,20',
            'admin_pass'=>'required|between:5,20',
        ];

    	// 提示信息
    	$mess = [
            'admin_name.required'=>'用户名必须填写',
            'admin_name.between'=>'用户名必须在5到20位之间',
            'admin_pass.required'=>'密码必须输入',
            'admin_pass.between'=>'密码必须在5到20位之间'
        ];

    	// $validator =  Validator::make($input,$rule,$mess);
    	// // 如果表单验证失败 passes()
    	// if ($validator->fails()) {
     //          return redirect('admin/login')
     //              ->withErrors($validator)
     //              ->withInput();
     //      }

    	 $validator =  Validator::make($input,$rule,$mess);
        //如果表单验证失败 passes()
          if ($validator->fails()) {
              return redirect('admin/user/create')
                  ->withErrors($validator)
                  ->withInput();
          }
       // 3.执行添加操作

        $user = new User();
        $user -> admin_name = $input['admin_name'];
        $user -> admin_pass = Crypt::encrypt($input['admin_pass']);
        $res = $user -> save();


      //  4.判断是否添加成功
        if($res){
            return redirect('admin/user') -> with('msg','添加成功');
        }else{
            return redirect('admin/user/create') -> with('msg','添加失败');
        }
        return view('admin/user/list');
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
       // 1.根据传过来的ID,获取要修改的用户记录
        $users = User::find($id);
       // 2.返回修改页面(要修改的用户记录)

        return view('admin.user.edit',compact('users'));
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
      //  1.通过id找到要修改的用户
        $users = User::find($id);
//        2.通过$request获取要修改的值
        $input = $request -> only('admin_name');
//        3.使用模型的update进行更新
        $res = $users->update($input);
//        4.根据更新是否成功,跳转页面
        if($res){
            return redirect('admin/user');
        }else{
            return redirect('admin/user/edit');
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
        $res = User::find($id)->delete();
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
