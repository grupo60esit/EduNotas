<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserActive
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->estado === 'inactivo') {
            Auth::logout();
            return redirect()->route('login')->with('warning', 'Tu cuenta ha sido desactivada.');
        }

        return $next($request);
    }
}
