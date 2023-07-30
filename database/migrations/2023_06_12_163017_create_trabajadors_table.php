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
        Schema::create('trabajadors', function (Blueprint $table) {
            $table->id();
            $table->foreignId('emisora_id') ->references('id') ->on('emisoras') ->cascadeOnDelete();
            $table->string('nombre');
            $table->bigInteger('ci');
            $table->string('provincia');
            $table->string('municipio');
            $table->string('direccion');
            $table->integer('edad');
            $table->string('sexo' );

            $table->enum('nivel_escolar', ['Nivel Superior', 'Medio Superior', 'Técnico Medio', 'menos 12.grado', 'menos   9.grado']);

            $table->enum('categoria_ocup', ['Cuadros', 'Administración', 'Obreros', 'Servicios', 'Técnicos', 'Artístas', 'Periodístas', 'Escritores']);

            $table->enum('org_politicas', ['PCC', 'UJC', 'FMC']);

            $table->enum('etnia', ['blancos', 'negros', 'mulatos']);

            //preguntar a pastel
            $table->enum('tipo_contrato', ['Indeterminado', 'Determinado', 'Contrato por Actuación u obra']);

            $table->integer('tiempo_ICRT');

            $table->boolean('salida_pais')-> nullable();
            $table->enum('area_geo', ['Nortamérica', 'Latinoamérica', 'Europa', 'Otras'])-> nullable();
            
            //Si la plantilla es null, los datos fecha_alta y baja no se muestran
            $table->boolean('plantilla') ->nullable();
            $table->date('fecha_alta') ->nullable();
            $table->date('fecha_baja') ->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trabajadors');
    }
};
