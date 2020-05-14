<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMi
{

    public function handle($request, Closure $next)
    {
        if(Auth::check())
        {
            if(Auth::user()->authorized("admin"))
            {
                return $next($request);
            }
        }
        return redirect('/login');
    }
}
