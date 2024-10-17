<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Entidad;  // Asegúrate de incluir el modelo Entidad

class ArticuloServicio extends Model
{
    protected $fillable = [
        'item_name', 'description', 'content_type', 'file', 'service_url', 'publish_date', 'author', 'status', 'user_id', 'entidad_id'
    ];

    // Relación: un artículo pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación: un artículo pertenece a una entidad
    public function entidad()
    {
        return $this->belongsTo(Entidad::class);  // Asegúrate de que la clase Entidad esté importada
    }
}
