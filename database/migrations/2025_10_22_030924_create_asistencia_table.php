<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('asistencias', function (Blueprint $table) {
            
            $table->increments('id_asistencia');
            $table->unsignedInteger('id_estudiante');
            $table->foreign('id_estudiante')
                  ->references('id_estudiante')
                  ->on('students')
                  ->cascadeOnUpdate()
                  ->restrictOnDelete();

            $table->unsignedInteger('id_trabajador');
            $table->foreign('id_trabajador')
                  ->references('id_trabajador')
                  ->on('trabajadores')
                  ->cascadeOnUpdate()
                  ->restrictOnDelete();

            $table->dateTime('fecha');                
            $table->time('hora_entrada')->nullable(); 
            $table->time('hora_salida')->nullable();  
            $table->string('estado', 20);             
            $table->string('observacion', 150)->nullable(); 

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::table('asistencias', function (Blueprint $table) {
            $table->dropForeign(['id_estudiante']);
            $table->dropForeign(['id_trabajador']);
        });

        Schema::dropIfExists('asistencias');
    }
};
