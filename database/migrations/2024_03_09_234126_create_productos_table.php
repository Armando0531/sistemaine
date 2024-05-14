<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_articulo');
            $table->text('descripcion')->nullable();
            $table->unsignedBigInteger('id_categoria');
            $table->unsignedBigInteger('unidad_medida_id');
            $table->date('fecha_vencimiento')->nullable();
            $table->string('clave_cucop', 13)->unique(); // Clave CUCOP única
            $table->integer('cantidad');
            $table->timestamps();

            $table->foreign('id_categoria')->references('id')->on('categorias')->onDelete('cascade');
            $table->foreign('unidad_medida_id')->references('id')->on('unidades')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('productos', function (Blueprint $table) {
            $table->dropForeign(['id_categoria']);
            $table->dropForeign(['unidad_medida_id']);
        });

        Schema::dropIfExists('productos');
    }
};
