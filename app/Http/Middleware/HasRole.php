<?php

namespace App\Http\Middleware;

use Closure;
use App\Model\admin\User;

class HasRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        // 如果当前用户有正在执行的路由的权限就放行,没有就给一个没有权限的提示
        
        // 1 获取当前用户执行操作时对应的路由的控制器方法
        // $route = \Route::current()->getActionName();

        // 2 获取当前用户拥有的权限
        // 2.1 获取当前用户
        $uid = session('user')->admin_id;
        // dd($uid);

        $user = User::find($uid);
         // dd($user);

        // $roles = User::find(1)->roles()->get();

        // 2.2 获取当前用户拥有的角色
        $roles = $user->role;
        // dd($roles);
        
        // 定义一个数组,存放用户拥有的所有权限
        $arr = [];
        // 2.3 根据拥有的角色获取所有权限
        foreach($roles as $k=>$v){
            // 根据角色找到相关权限的数组
           $permission = $v->permission;
           // dd($permission);

           // 把每个角色下的权限全部拿出来
           foreach($permission as $m=>$n){
                $arr[] = $n->description;
           }
        }
        // dd($permission);
        // dd($arr);
        
        // 去除权限数组中重复的值
        $arr = array_unique($arr);
        // dd($arr);

        // 2.4 判断当前路由对应的控制器方法是否在用户拥有的权限中
        
        // 当前用户拥有的权限
         // array:3 [▼
            //   0 => "App\Http\Controllers\Admin\IndexController@index"
            //   1 => "App\Http\Controllers\Admin\UserController@create"
            //   2 => "App\Http\Controllers\Admin\UserController@index"
            // ]
            
        // 当前请求路由对应的方法
        // "App\Http\Controllers\Admin\IndexController@index"
       
        $route = \Route::current()->getActionName();
        $controller = explode('@', $route);
        // dd($controller[0]);
        // dd($route);

        // 如果当前请求对应的方法在用户拥有的权限中,就放行,如果不在就表示没有权限
        if(in_array($controller[0], $arr)){
            return $next($request);
        }else if(in_array($route, $arr)){
            return $next($request);
        }else{
            return redirect('errors/auth');
        }
   }     

}
