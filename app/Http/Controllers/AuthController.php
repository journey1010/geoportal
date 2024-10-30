<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    // Registrar un nuevo usuario
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'entidad_id' => 'required|integer'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'entidad_id' => $request->entidad_id
        ]);

        return response()->json(['message' => 'Usuario registrado exitosamente', 'user' => $user]);
    }

    // Autenticar usuario y generar tokens
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        try {
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'Credenciales inválidas'], 401);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'No se pudo crear el token'], 500);
        }

        $refreshToken = JWTAuth::claims(['exp' => now()->addMinutes(config('jwt.refresh_ttl'))])->fromUser(Auth::user());

        return response()->json([
            'access_token' => $token,
            'refresh_token' => $refreshToken,
            'expires_in' => JWTAuth::factory()->getTTL() * 60
        ]);
    }

    // Refrescar token de operación
    public function refresh()
    {
        try {
            $newToken = JWTAuth::refresh(JWTAuth::getToken());

            return response()->json([
                'access_token' => $newToken,
                'expires_in' => JWTAuth::factory()->getTTL() * 60
            ]);
        } catch (JWTException $e) {
            return response()->json(['error' => 'Token de refresco inválido'], 401);
        }
    }

    // Cerrar sesión e invalidar tokens
    public function logout()
    {
        JWTAuth::invalidate(JWTAuth::getToken());

        return response()->json(['message' => 'Sesión cerrada exitosamente']);
    }
}