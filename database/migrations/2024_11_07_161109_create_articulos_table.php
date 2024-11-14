<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticulosTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('articulos', function (Blueprint $table) {
            $table->id(); // ID autoincremental
            $table->string('nombre_item', 255); // Nombre del artículo
            $table->text('descripcion'); // Descripción
            $table->enum('tipo_contenido', ['object', 'service']); // Tipo de contenido
            $table->string('autor', 100); // Autor
            $table->unsignedTinyInteger('estado')->default(0); // Estados posibles 0: Pendiente, 1: Aprobado, 2: Rechazado
            $table->unsignedBigInteger('user_id'); // Relación con usuarios
            $table->unsignedBigInteger('entidad_id'); // Relación con entidades
            $table->timestamps(); // created_at y updated_at

            // Relaciones
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('entidad_id')->references('id')->on('entidades')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articulos');
    }
}
