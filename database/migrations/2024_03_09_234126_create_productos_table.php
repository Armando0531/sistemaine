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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_articulo');
            $table->text('descripcion')->nullable();
            $table->unsignedBigInteger('id_categoria');
            $table->foreign('id_categoria')->references('id')->on('categorias');
            $table->unsignedBigInteger('unidad_medida_id'); 
            $table->foreign('unidad_medida_id')->references('id')->on('unidades');
            $table->date('fecha_vencimiento')->nullable();
            $table->date('fecha_entrada');
            $table->string('clave_cucop', 13);
            $table->integer('cantidad');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
