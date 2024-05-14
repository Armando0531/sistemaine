<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('entradas', function (Blueprint $table) {
            $table->id();
            $table->string('clave_cucop', 13);
            $table->unsignedBigInteger('id_proveedor');
            $table->integer('cantidad_entrada');
            $table->date('fecha_entrada');
            $table->timestamps();

            $table->foreign('clave_cucop')->references('clave_cucop')->on('productos')->onDelete('cascade');
            $table->foreign('id_proveedor')->references('id')->on('proveedores')->onDelete('cascade');
        });

        // Crear el trigger para actualizar la cantidad de productos
        DB::unprepared("
            CREATE TRIGGER after_entrada_insert
            AFTER INSERT ON entradas
            FOR EACH ROW
            BEGIN
                UPDATE productos
                SET cantidad = cantidad + NEW.cantidad_entrada
                WHERE clave_cucop = NEW.clave_cucop;
            END;
        ");
    }

    public function down(): void
    {
        Schema::dropIfExists('entradas');
    }
};

