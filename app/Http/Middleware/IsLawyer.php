<?php

namespace App\Http\Middleware;

use Closure;

class IsLawyer
{

    public function handle($request, Closure $next)
    {
        if(session()->get('~__~')=='0710'){
            return $next($request);
        }
        else{
            return redirect('/noaccess');
        }
    }
}
