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
            $table->string('item_name', 255) ->change();
            $table->text('description');  // TEXT
            $table->enum('content_type', ['object', 'service']);  
            $table->string('file', 500) ->change();
            $table->string('service_url', 500) ->change(); 
            $table->date('publish_date'); 
            $table->string('author', 100);  
            $table->integer('status')->default(1);
            
            // Campos que asocian el registro con el usuario y la entidad
            $table->unsignedBigInteger('user_id');  // Relación con el usuario que sube el contenido
            $table->unsignedBigInteger('entidad_id');  // Relación con la entidad que guarda el registro

            // Definir las relaciones foráneas
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('entidad_id')->references('id')->on('entidades')->onDelete('cascade');

            $table->timestamps();
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
