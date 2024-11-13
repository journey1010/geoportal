<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMotivoRechazoToArticulosTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('articulos', function (Blueprint $table) {
            // Añadir la columna `motivo_rechazo` si no existe
            if (!Schema::hasColumn('articulos', 'motivo_rechazo')) {
                $table->string('motivo_rechazo', 500)->nullable()->after('estado');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('articulos', function (Blueprint $table) {
            // Eliminar la columna `motivo_rechazo` si existe
            $table->dropColumn('motivo_rechazo');
        });
    }
}
