<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    use HasFactory;

    // Especifica la tabla asociada (si no sigue el plural estándar de Laravel)
    protected $table = 'articulos';

    // Campos que pueden ser llenados masivamente
    protected $fillable = [
        'nombre_item',
        'descripcion',
        'tipo_contenido',
        'fecha_publicacion',
        'autor',
        'estado',
        'user_id',
        'entidad_id',
    ];
}
