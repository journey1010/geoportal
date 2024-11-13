<?php

namespace App\Http\Controllers;


use App\Models\Articulo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ArticuloController extends Controller
{
    public function store(Request $request)
    {
        // Validación de los datos
        $validatedData = $request->validate([
            'nombre_item' => 'required|string|max:255',
            'descripcion' => 'required|string|max:500',
            'tipo_contenido' => 'required|string|in:object,service',
            'fecha_publicacion' => 'required|date',
            'autor' => 'required|string|max:100',
            'user_id' => 'required|integer',
            'entidad_id' => 'required|integer',
        ]);

        // Estado inicial del artículo
        $validatedData['estado'] = 'pendiente'; // Estado inicial como texto

        // Crear el artículo
        $articulo = Articulo::create($validatedData);

        // Respuesta JSON
        return response()->json([
            'success' => true,
            'message' => 'Artículo subido y pendiente de revisión.',
            'data' => $articulo,
        ], 201);
    }

    public function revisar(Request $request, $id)
    {
        // Verificar si el usuario está autenticado
        $user = Auth::user();

        // Si el usuario no es admin, denegar acceso
        if ($user->role !== 'admin') {
            return response()->json([
                'message' => 'Acceso denegado. Solo los administradores pueden realizar esta acción.'
            ], 403);
        }

        // Continúa con la lógica de revisión del artículo
        $articulo = Articulo::findOrFail($id);

        $request->validate([
            'estado' => 'required|in:aprobado,rechazado',
            'motivo_rechazo' => 'nullable|string|max:500',
        ]);

        $articulo->estado = $request->estado;

        if ($request->estado === 'rechazado') {
            $articulo->motivo_rechazo = $request->motivo_rechazo;
        } else {
            $articulo->motivo_rechazo = null;
        }

        $articulo->save();

        return response()->json([
            'success' => true,
            'message' => $request->estado === 'aprobado'
                ? 'Artículo aprobado exitosamente.'
                : 'Artículo rechazado.',
            'data' => $articulo,
        ]);
    }
}
