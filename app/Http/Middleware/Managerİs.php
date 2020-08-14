<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Managerİs
{

    public function handle($request, Closure $next)
    {
        if(Auth::check())
        {
            if(Auth::user()->authorized("manager"))
            {
                return $next($request);
            }
        }
        return redirect('/login');
    }
}
