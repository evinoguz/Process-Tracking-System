<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class YazarMi
{
    public function handle($request, Closure $next)
    {
        if(Auth::check())
        {
            if(Auth::user()->authorized('author'))
            {
                return $next($request);
            }

        }
        return redirect('/login');
    }
}
