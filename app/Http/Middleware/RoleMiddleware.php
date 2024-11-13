<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, $role): mixed
    {
        // Verificamos si el usuario está autenticado
        $user = Auth::user();

        // Si no está autenticado o no tiene el rol requerido, denegamos acceso
        if (!$user || $user->role !== $role) {
            return response()->json([
                'message' => 'Acceso denegado. No tienes los permisos necesarios.'
            ], 403); // Código HTTP 403: Prohibido
        }

        // Si tiene el rol, permitimos que continúe
        return $next($request);
    }
}
