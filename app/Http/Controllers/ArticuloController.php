<?php

namespace App\Http\Controllers;

use App\Models\Articulo;
use Illuminate\Http\Request;
use App\Http\Requests\ArticuloServicio\Revisar;
use Exception;

class ArticuloController extends Controller
{
    public function revisar(Revisar $request)
    {
        try{
            // Buscar el artículo
            $articulo = Articulo::findOrFail($request->id);
            // Actualizar estado del artículo
            $articulo->estado = $request->estado;
            $articulo->motivo_rechazo = $request->estado == 2 ? $request->motivo_rechazo : null;
            $articulo->save();
            return response()->json(['message' => 'Actualizado'], 200);
        }catch(Exception $e){
            $this->LogError($e, __FUNCTION__);
            return $this->defaultResponse($e);
        }
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
