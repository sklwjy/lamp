<?php

namespace App\Http\Middleware;

use Closure;

class Login
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
            // 获取传过来的路由
            $url = "home/index";
             // dd($url);
            \Session::put('url', $url);
            // $url = session('url');
            // dd($url);
            return $next($request);
        
    }
}
