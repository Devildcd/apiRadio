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
        Schema::create('modelos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('trabajador_id')-> references('id')-> on('trabajadors')-> cascadeOnDelete()-> cascadeOnUpdate();

            $table->enum('especialidad', ['Política de Empleo', 'Salud y Seguridad', 'Salario']);

            $table->enum('nombre', ['Fuerza de Trabajo', 'Ausentismo', 'Violaciones', 'Salida del país', 'Maestrías',
                                    'Artistas', 'Servicio Social', 'Pluriempleo', 'Jubilados', 'Potencial de Empleo', 
                                    'Dengue-Covid-Vacunación']);

            $table->enum('marca_tiempo', ['trimestre', 'semestre']);

            $table->enum('periodo', ['diciembre-febrero', 'marzo-mayo', 'junio-agosto', 'septiembre-noviembre', 
                                     'diciembre-mayo', 'junio-noviembre']);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modelos');
    }
};
