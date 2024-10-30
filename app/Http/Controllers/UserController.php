<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    // Registrar un nuevo usuario
    public function store(Request $request)
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

        return response()->json(['message' => 'Usuario creado exitosamente', 'user' => $user]);
    }

    // Editar usuario existente
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|string|email|max:255|unique:users,email,'.$user->id,
            'password' => 'sometimes|string|min:6|confirmed',
            'entidad_id' => 'sometimes|integer'
        ]);

        $user->update([
            'name' => $request->name ?? $user->name,
            'email' => $request->email ?? $user->email,
            'password' => $request->password ? bcrypt($request->password) : $user->password,
            'entidad_id' => $request->entidad_id ?? $user->entidad_id
        ]);

        return response()->json(['message' => 'Usuario actualizado exitosamente', 'user' => $user]);
    }
}