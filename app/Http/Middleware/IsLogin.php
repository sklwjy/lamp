<?php

namespace App\Http\Middleware;

use Closure;


class IsLogin
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
        if(\Session::get('user')){
            return $next($request);
        }else {
            return redirect('admin/login')->with('errors', '请先登录!!');
        }
    }
}
