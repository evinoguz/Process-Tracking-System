<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Customerİs
{

    public function handle($request, Closure $next)
    {
        if(Auth::check())
        {
            if(Auth::user()->authorized("customer"))
            {
                return $next($request);
            }
        }
        return redirect('/login');
    }
}
