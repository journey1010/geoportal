<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use Illuminate\Http\Request;

class ArticuloController extends Controller
{
    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'nombre_item' => 'required|string|max:255',
                'descripcion' => 'required|string|max:500',
                'tipo_contenido' => 'required|string|in:object,service',
                'fecha_publicacion' => 'required|date',
                'autor' => 'required|string|max:100',
                'estado' => 'required|boolean',
                'user_id' => 'required|integer',
                'entidad_id' => 'required|integer',
            ]);

            $articulo = Articulo::create($validatedData);

            return response()->json([
                'success' => true,
                'message' => 'Artículo guardado exitosamente.',
                'data' => $articulo,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Ocurrió un error',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
