<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ArticuloServicio;

class ArticuloServicioController extends Controller
{
    // Método para guardar un nuevo artículo
    public function store(Request $request)
    {
        // Crear un nuevo registro en la tabla 'articulos_servicios'
        $articulo = new ArticuloServicio();
        $articulo->item_name = $request->input('item_name');
        $articulo->description = $request->input('description');
        $articulo->content_type = $request->input('content_type');
        $articulo->file = $request->input('file');  
        $articulo->service_url = $request->input('service_url');
        $articulo->publish_date = $request->input('publish_date');

        // Obtener el nombre del usuario autenticado
        $articulo->author = auth()->user()->name;  // Usar auth()->user()->name para el nombre
        
        // Obtener el ID del usuario autenticado
        $articulo->user_id = auth()->id();  // Usar auth()->id() para el ID del usuario
        
        // Guardar el ID de la entidad seleccionada
        $articulo->entidad_id = $request->input('entidad_id');
        
        // Guardar el artículo en la base de datos
        $articulo->save();

        // Redirigir después de guardar
        return redirect()->back()->with('success', 'Artículo guardado con éxito.');
    }
}
