<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */

    public function handle($request, \Closure $next, ...$guards)
    {


        if (!Auth::check()) {

            return redirect()->route('login')->with('error', 'Por favor, inicia sesión para acceder a esta pagina');
        }


        return $next($request);

    }
    protected function redirectTo(Request $request): ?string
    {


        return $request->expectsJson() ? null : route('login');
    }
}
