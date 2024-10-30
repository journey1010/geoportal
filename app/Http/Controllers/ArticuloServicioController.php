<?php

namespace App\Http\Controllers;

use App\Models\ArticuloServicio;
use App\Http\Requests\ArticuloServicio\Store;
use App\Models\User;

class ArticuloServicioController extends Controller
{

    // Método para guardar un nuevo artículo
    public function store(Store $request)
    {
        try{
            // Crear un nuevo registro en la tabla 'articulos_servicios'

            $articulo = new ArticuloServicio();
            $articulo->item_name = $request->input('item_name');
            $articulo->description = $request->input('description');
            $articulo->content_type = $request->input('content_type');
            $articulo->file = $request->input('file');
            $articulo->service_url = $request->input('service_url');
            $articulo->publish_date = $request->input('publish_date');
            
                
            // Obtener el nombre del usuario autenticado
            $articulo->author = $request->name;  // Método válido de Laravel

            // Obtener el ID del usuario autenticado
            $articulo->user_id = request()->user();  // Método válido de Laravel

            // Guardar el ID de la entidad seleccionada
            $articulo->entidad_id = $request->input('entidad_id');

            // Guardar el artículo en la base de datos
            $articulo->save();

            return response()->json([
                'message' => 'Artículo guardado con éxito.'
            ], 200);
        }catch(\Exception $e){
            $this->LogError($e, __FUNCTION__);
            return response()->json([
                'message' => 'Estamos experimentando problemas temporales'
            ], 500);
        }
    }
}