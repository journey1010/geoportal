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
            $table->string('item_name', 150);  
            $table->text('description');  // TEXT
            $table->enum('content_type', ['object', 'service']);  
            $table->string('file', 255);  
            $table->string('service_url', 255);  
            $table->date('publish_date'); 
            $table->string('author', 100);  
            $table->boolean('status');  
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
