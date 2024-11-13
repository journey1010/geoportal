<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use Illuminate\Http\Request;

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
        // Buscamos el artículo por su ID
        $articulo = Articulo::findOrFail($id);

        // Validamos que el administrador envíe el estado y, si es rechazado, el motivo
        $request->validate([
            'estado' => 'required|in:aprobado,rechazado', // Solo se acepta "aprobado" o "rechazado"
            'motivo_rechazo' => 'nullable|string|max:500', // Motivo del rechazo (opcional)
        ]);

        // Actualizamos el estado del artículo
        $articulo->estado = $request->estado;

        // Si el estado es rechazado, guardamos el motivo
        if ($request->estado === 'rechazado') {
            $articulo->motivo_rechazo = $request->motivo_rechazo;
        } else {
            $articulo->motivo_rechazo = null; // Si es aprobado, limpiamos el motivo
        }

        // Guardamos los cambios en la base de datos
        $articulo->save();

        // Respondemos con un mensaje de éxito
        return response()->json([
            'success' => true,
            'message' => $request->estado === 'aprobado'
                ? 'Artículo aprobado exitosamente.'
                : 'Artículo rechazado.',
            'data' => $articulo, // Retornamos los datos actualizados del artículo
        ]);
    }
}
