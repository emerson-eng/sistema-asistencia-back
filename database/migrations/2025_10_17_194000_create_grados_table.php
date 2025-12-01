<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('grados', function (Blueprint $table) {
            // PK autoincremental
            $table->increments('id_grado');

            // Atributos solicitados
            $table->string('nombre_grado', 50); // Ej: "Primer Grado", "Segundo Grado"
            $table->string('nivel', 50);        // Ej: "Primaria", "Secundaria"

            // Timestamps opcionales
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('grados');
    }
};
