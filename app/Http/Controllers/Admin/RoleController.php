<?php

namespace App\Http\Controllers\Admin;

use DB;
use App\Model\admin\Permission;
use Illuminate\Http\Request;
use App\Model\admin\Role;
use App\Http\Controllers\Controller;

class RoleController extends Controller
{
    /**
     *  返回给角色授权的页面
     */
    public function auth($id)
    {
        // 获取当前角色
        $role = Role::find($id);
        // dd($role);

        // 获取所有权限分组
        $group = DB::table('permissions')->pluck('group_name', 'group_id');
        // dd($group);       
       
        // dd($permissions);

        // 获取当前角色已经拥有的权限分组
        $arr = [];
        $own_permissions = DB::table('role_permission')->where('role_id', $id)->pluck('group_id');
        // dd($own_permissions);

        // 获取权限对应的分组
        // foreach($own_permissions as $m=>$n){
        //       $arr[] = DB::table('permissions')->where('id', $n)->get();
        // }
        //  dd($arr);

        foreach($own_permissions as $k=>$v){
            $arr[] = $v;
        }
        // dd($arr);
        
        $arr = array_unique($arr);
        // dd($arr);
        
        return view('admin/role/auth', compact('role', 'group', 'arr'));
    }

    /**
     *  处理用户授权操作
     */
    public function doauth(Request $request)
    {
        // 接受用户提交的所有数据
        $input = $request->except('_token');
        // dd($input);

//        "user_id" => "6"
//          "role_id" => array:2 [▼
//            0 => "1"
//            1 => "2"
//          ]
//        ==========>
//        user_id    role_id
//         6           1
//         6           2


        // $arr = [];
        // $arr1 = [];
// 
          // dd($arr);
        // foreach($arr as $m=>$n){
        //     foreach($n as $a){
        //         $arr1[]=$a;
        //     }
        // }
        // dd($arr1);
        // dd($arr);

        // 开启事务
        DB::beginTransaction();

        try{
            //删除角色以前拥有的权限
            DB::table('role_permission')->where('role_id',$input['role_id'])->delete();
//            给当前角色重新授权


            foreach($input['group_id'] as $k=>$v){
            $arr = DB::table('permissions')->where('group_id', $v)->pluck('id'
                );
            // dd($arr);
            foreach($arr as $h=>$l){
                // $l=iterator_to_array($l);
                // dd($l);
                
                    DB::table('role_permission')->insert(['role_id'=>$input['role_id'],'permission_id'=>$l, "group_id"=>$v]);
               
                // continue;
                }
            }

        }catch (Exception $e){
            DB::rollBack();
        }

        DB::commit();

        //添加成功后，跳转到列表页
        return redirect('admin/role');

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = Role::get();
        return view('admin/role/list', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/role/add');
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
        // dd($input);
        
        $role = new Role();
        $role->name = $input['name'];
        $role->description = $input['description'];
        $role->group_id = $input['group_id'];
        $role->group_name = $input['group_name'];

        $res = $role->save();

        if($res){
            return redirect('admin/role')->with('msg', '添加成功');
        }else{
            return redtrect('admin/role/create')->with('msg', '添加失败');
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

        $role = Role::find($id);
        // dd($role);
        
        // 返回修改页面
        return view('admin/role/edit', compact('role'));
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
        // 通过id找到要修改的那个用户
        $role = Role::find($id);

        // 通过request获取要修改的值
        $input = $request->except('_token');
        // dd($input);
        
        // 使用模型update进行更新
        $res = $role->update($input);

        if($res){
            return redirect('admin/role');
        }else{
            return redirect('admin/role/'.$role->id.'/edit');
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
       $res = Role::find($id)->delete();

       // 定义一个数组存放数据
       $data = [];
       if($res){
            $data['error'] = 0;
            $data['msg'] ="删除成功";
        }else{
            $data['error'] = 1;
            $data['msg'] ="删除失败";
        }

        return $data;

    }
}
