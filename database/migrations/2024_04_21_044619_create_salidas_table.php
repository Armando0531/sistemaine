<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('salidas', function (Blueprint $table) {
            $table->id();
            $table->string('clave_cucop', 13);
            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_area_administrativa'); 
            $table->integer('cantidad_salida');
            $table->date('fecha_salida');
            $table->timestamps();

            // Establecer las llaves foráneas
            $table->foreign('clave_cucop')->references('clave_cucop')->on('productos')->onDelete('cascade');
            $table->foreign('id_usuario')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_area_administrativa')->references('id')->on('areasadmin')->onDelete('cascade');
        });

        // Crear el trigger para actualizar la cantidad de productos
        DB::unprepared("
            CREATE TRIGGER after_salida_insert
            AFTER INSERT ON salidas
            FOR EACH ROW
            BEGIN
                UPDATE productos
                SET cantidad = cantidad - NEW.cantidad_salida
                WHERE clave_cucop = NEW.clave_cucop;
            END;
        ");
    }

    public function down(): void
    {
        Schema::dropIfExists('salidas');
    }
};

