<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $fillable = [
        'nombre_item',
        'descripcion',
        'tipo_contenido',
        'autor',
        'estado', // 0=Pendiente, 1=Aprobado, 2=Rechazado
        'motivo_rechazo', // Solo si es rechazado
        'user_id',
        'entidad_id',
    ];

    const ESTADO_PENDIENTE = 'pendiente';
    const ESTADO_APROBADO = 'aprobado';
    const ESTADO_RECHAZADO = 'rechazado';
}
