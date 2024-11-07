<?php

namespace App\Http\Controllers;

use App\Models\ArticuloServicio;
use Illuminate\Http\Request;

class ArticuloServicioController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'item_name' => 'required|string|max:255',
            'description' => 'required|string',
            'content_type' => 'nullable|string',
            'file' => 'nullable|string',
            'service_url' => 'nullable|url',
            'publish_date' => 'nullable|date',
            'entidad_id' => 'nullable|integer'
        ]);

        try {
            $articulo = new ArticuloServicio();
            $articulo->item_name = $request->input('item_name');
            $articulo->description = $request->input('description');
            $articulo->content_type = $request->input('content_type');
            $articulo->file = $request->input('file');
            $articulo->service_url = $request->input('service_url');
            $articulo->publish_date = $request->input('publish_date');
            $articulo->author = $request->user()->name;  // Nombre del usuario autenticado
            $articulo->user_id = $request->user()->id;   // ID del usuario autenticado
            $articulo->entidad_id = $request->input('entidad_id');

            $articulo->save();

            return response()->json([
                'message' => 'Artículo guardado con éxito.',
                'data' => $articulo
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Estamos experimentando problemas temporales'
            ], 500);
        }
    }
}