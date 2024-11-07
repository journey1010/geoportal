<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticuloServicio extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_name', 'description', 'content_type', 'file', 'service_url', 'publish_date', 'author', 'user_id', 'entidad_id'
    ];
} 