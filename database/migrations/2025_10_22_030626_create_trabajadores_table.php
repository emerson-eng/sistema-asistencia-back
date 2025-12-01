<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('trabajadores', function (Blueprint $table) {
           
            $table->increments('id_trabajador');

        
            $table->string('dni', 8)->unique();          
            $table->string('nombres', 100);              
            $table->string('apellidos', 100);             
            $table->string('cargo', 50);                  
            $table->string('telefono', 20)->nullable();   
            $table->string('direccion', 150)->nullable(); 

            $table->unsignedInteger('id_tipo');
            $table->foreign('id_tipo')
            ->references('id_tipo')->on('tipo_trabajadores')
            ->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::table('trabajadores', function (Blueprint $table) {
            $table->dropForeign(['id_tipo']);
        });

        Schema::dropIfExists('trabajadores');
    }
};
