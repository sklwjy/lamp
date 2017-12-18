<?php

namespace App\Http\Middleware;

use Closure;


class HomeIsLogin
{
    /**
     * 判断用户是否登录的中间件.
     *
     * @author  尚凯龙
     * @date    2017-11-30 09:17
     * @return redirect or $next
     */
    public function handle($request, Closure $next)
    {
        if(\Session::get('users')){
            return $next($request);
        }else {
            // 获取传过来的路由
            $url = $request->url();
             // dd($url);
            \Session::put('url', $url);
            // $url = session('url');
            // dd($url);
            return redirect('emailregister')->with('errors', '请先登录!!');
        }
    }
}
