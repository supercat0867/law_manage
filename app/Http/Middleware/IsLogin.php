<?php

namespace App\Http\Middleware;

use Closure;

class IsLogin
{

    public function handle($request, Closure $next)
    {
        if(session()->get('token')){
            return $next($request);
        }
        else{
            $target=$request->fullUrl();
            return redirect('/login?Link='.$target);
        }
    }
}
