<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role)
    {

        $user = Auth::user();

        if ($user->role_id === (int) $role) {
            error_log('has permission');
            return $next($request);
        }

        switch ($user->role_id) {
            case 1:
                return redirect('/admin/home/offers');
            case 2:
                return redirect('/home');
            case 3:
                return redirect('/clerk/home');
            case 4:
                return redirect('/offerer/home');
            default:
                return redirect('/');
        }

    }

}
