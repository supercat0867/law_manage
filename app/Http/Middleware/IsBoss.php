<?php

namespace App\Http\Middleware;

use Closure;

class IsBoss
{

    public function handle($request, Closure $next)
    {
        if(session()->get('XD')=='boss'){
            return $next($request);
        }
        else{
            return redirect('/noaccess');
        }
    }
}
