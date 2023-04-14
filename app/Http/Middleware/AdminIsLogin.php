<?php

namespace App\Http\Middleware;

use Closure;

class AdminIsLogin
{

    public function handle($request, Closure $next)
    {
        if(session()->get('adminInfo')){
            return $next($request);
        }
        else{
            return redirect('admin/login')->with("errors","请先登录!");
        }
    }
}
