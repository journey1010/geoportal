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
    public function handle(Request $request, Closure $next, $role)
    {
        $user = Auth::user();

        // Validar si el usuario tiene el rol correcto
        if (!$user || $user->role !== $role) {
            return response()->json([
                'message' => 'Acceso denegado. No tienes los permisos necesarios.',
            ], 403);
        }
        
        $request->merge([
            'userId' => $user->id
        ]);

        return $next($request);
    }
}