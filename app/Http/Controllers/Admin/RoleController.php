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

        // 获取所有权限
        $permissions = Permission::get();
        // dd($permission);

        // 获取当前角色已经拥有的权限
        $arr = [];
        $own_permissions = DB::table('role_permission')->where('role_id', $id)->pluck('permission_id');
        foreach($own_permissions as $k=>$v){
            $arr[] = $v;
        }
        // dd($arr);
        // dd($own_permission);
        
        return view('admin/role/auth', compact('role', 'permissions', 'arr'));
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


        // 开启事务
        DB::beginTransaction();

        try{
            //删除角色以前拥有的权限
            DB::table('role_permission')->where('role_id',$input['role_id'])->delete();
//            给当前角色重新授权


//        2. 将授权数据添加到permission_role表中
            if(isset($input['permission_id'])){
                foreach ($input['permission_id'] as $k=>$v){
                    DB::table('role_permission')->insert(['role_id'=>$input['role_id'],'permission_id'=>$v]);
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
        //
    }
}
