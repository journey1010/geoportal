<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArticuloServicio;

class ArticuloServicioController extends Controller
{
    // Constructor para agregar el middleware de autenticación
    public function __construct()
    {
        $this->middleware('auth'); // Método correcto en Laravel
    }

    // Método para guardar un nuevo artículo
    public function store(Request $request)
    {
        // Validar los datos antes de guardar
        $request->validate([
            'item_name' => 'required|string|max:255',
            'description' => 'required|string',
            'content_type' => 'required|string',
            'file' => 'nullable|string',
            'service_url' => 'nullable|string',
            'publish_date' => 'required|date',
            'entidad_id' => 'required|integer'
        ]);

        // Crear un nuevo registro en la tabla 'articulos_servicios'
        $articulo = new ArticuloServicio();
        $articulo->item_name = $request->input('item_name');
        $articulo->description = $request->input('description');
        $articulo->content_type = $request->input('content_type');
        $articulo->file = $request->input('file');
        $articulo->service_url = $request->input('service_url');
        $articulo->publish_date = $request->input('publish_date');

        // Obtener el nombre del usuario autenticado
        $articulo->author = auth()->user()->name;  // Método válido de Laravel

        // Obtener el ID del usuario autenticado
        $articulo->user_id = auth()->id();  // Método válido de Laravel

        // Guardar el ID de la entidad seleccionada
        $articulo->entidad_id = $request->input('entidad_id');

        // Guardar el artículo en la base de datos
        $articulo->save();

        // Redirigir después de guardar con un mensaje de éxito
        return redirect()->back()->with('success', 'Artículo guardado con éxito.');
    }
}
