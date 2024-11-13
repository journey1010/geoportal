<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entidad extends Model
{
    use HasFactory;

    /**
     * El nombre de la tabla asociada al modelo.
     *
     * @var string
     */
    protected $table = 'entidades';

    /**
     * Los campos que pueden ser asignados masivamente.
     *
     * @var array
     */
    protected $fillable = [
        'entity_name',
        'description',
        'contact',
    ];
}
