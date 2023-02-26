<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cursos', function (Blueprint $table) {
            $table->id();
            $table->string('curso_nombre');
            $table->string('curso_imagen');  
            $table->string('curso_creador');
            $table->string('curso_original_link');
            $table->string('curso_link');
            $table->integer('curso_valoracion')->nullable();
            $table->unsignedBigInteger('curso_subcategoria_id');
            $table->unsignedBigInteger('curso_estado_id');
            $table->foreign('curso_subcategoria_id')->references('id')->on('subcategorias');
            $table->foreign('curso_estado_id')->references('id')->on('estados');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cursos');
    }
};
