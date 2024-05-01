<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckAuthenticated
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            error_log('user ok');
            return $next($request);
        }
        error_log('user no ok');
        return redirect('/');
    }
}
