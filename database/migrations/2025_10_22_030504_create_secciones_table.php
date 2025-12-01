<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('secciones', function (Blueprint $table) {

            $table->increments('id_seccion');


            $table->unsignedInteger('id_grado');
            $table->foreign('id_grado')
                  ->references('id_grado')
                  ->on('grados')
                  ->cascadeOnUpdate()
                  ->restrictOnDelete();


            $table->string('nombre_seccion', 50);
            $table->integer('capacidad');
            $table->integer('anio_lectivo');


            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::table('secciones', function (Blueprint $table) {
            $table->dropForeign(['id_grado']);
        });

        Schema::dropIfExists('secciones');
    }
};
