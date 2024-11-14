<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticuloController extends Controller
{
    public function revisar(Request $request, $id)
    {
        // Verificar si el usuario tiene rol de administrador
        $user = Auth::user();
        if ($user->role !== 'admin') {
            return response()->json([
                'message' => 'Acceso denegado. Solo los administradores pueden realizar esta acción.'
            ], 403);
        }

        // Buscar el artículo
        $articulo = Articulo::findOrFail($id);

        // Validar los datos del request
        $request->validate([
            'estado' => 'required|in:1,2', // 1: Aprobado, 2: Rechazado
            'motivo_rechazo' => 'nullable|string|max:500',
        ]);

        // Actualizar estado del artículo
        $articulo->estado = $request->estado;

        if ($request->estado == 2) { // Si es rechazado
            $articulo->motivo_rechazo = $request->motivo_rechazo;
        } else { // Si es aprobado
            $articulo->motivo_rechazo = null;
        }

        $articulo->save();
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_item' => 'required|string|max:255',
            'descripcion' => 'required|string|max:500',
        ]);

        $articulo = Articulo::create($request->all());

        return response()->json([
            'data' => $articulo,
        ]);
    }
}
