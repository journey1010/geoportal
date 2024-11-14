<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('articulos_servicios', function (Blueprint $table) {
            $table->id();
            $table->string('item_name', 255); // Nombre del artículo/servicio
            $table->text('description');  // Descripción en formato TEXT
            $table->enum('content_type', ['object', 'service']); // Tipo de contenido
            $table->string('file', 500); // Archivo relacionado
            $table->string('service_url', 500); // URL del servicio
            $table->date('publish_date'); // Fecha de publicación
            $table->string('author', 100); // Autor del contenido
            $table->enum('status', ['pendiente', 'aprobado', 'rechazado'])->default('pendiente'); // Estado del artículo

            // Relaciones
            $table->unsignedBigInteger('user_id'); // ID del usuario que subió el artículo
            $table->unsignedBigInteger('entidad_id'); // ID de la entidad asociada

            // Claves foráneas
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('entidad_id')->references('id')->on('entidades')->onDelete('cascade');

            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articulos_servicios');
    }
};
