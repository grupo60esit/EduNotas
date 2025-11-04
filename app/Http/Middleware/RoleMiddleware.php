<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Manejar la petición entrante.
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            return redirect()->route('login'); // si no está logueado
        }

        $user = Auth::user();

        // Validar si el usuario tiene al menos uno de los roles permitidos
        if (!$user->hasAnyRole($roles)) {
            return response()->view('errors.403', [], 403);
        }

        return $next($request);
    }
}
