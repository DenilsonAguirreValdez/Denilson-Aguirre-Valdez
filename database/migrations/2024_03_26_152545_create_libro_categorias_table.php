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
        Schema::create('libro_categorias', function (Blueprint $table) {
            $table->id('libroCategoriaId');
            $table->unsignedBigInteger('libroId');
            $table->unsignedBigInteger('categoriaId');
            $table->timestamps();

            $table->foreign('libroId')->references('libroId')->on('libros');
            $table->foreign('categoriaId')->references('categoriaId')->on('categorias');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('libro_categorias');
    }
};

