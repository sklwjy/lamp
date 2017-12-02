<?php

namespace App\Http\Middleware;

use Closure;
use Session;
class IsLogin
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

        if (Session::get('user')) {
            return $next($request);
        }else{

            return redirect('home/login')->with('errors','请先登录，注意素质');
        }
    }
}
