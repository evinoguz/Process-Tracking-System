<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Employeesİs
{

    public function handle($request, Closure $next)
    {
        if(Auth::check())
        {
            if(Auth::user()->authorized("employees"))
            {
                return $next($request);
            }
        }
        return redirect('/login');
    }
}
