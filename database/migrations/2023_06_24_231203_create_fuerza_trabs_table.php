<?php

use App\Models\FuerzaTrab;
use App\Models\Modelo;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Trabajador;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('fuerza_trabs', function (Blueprint $table) {
            $table->id();

            $table->foreignId('modelo_id')-> constrained('modelos');
           
            $table->integer('plant_aprob_actual');

            // DB::statement('UPDATE fuerza_trabs SET plant_aprob_actual = (
            //     SELECT COUNT(*)
            //     FROM trabajadors
            //     WHERE plantilla = true
            //     AND trabajadors.id IN (
            //         SELECT modelos.trabajador_id
            //         FROM modelos
            //         WHERE modelos.id = fuerza_trabs.modelo_id
            //     )
            //     AND trabajadors.emisora_id IN (
            //         SELECT trabajadors.emisora_id
            //         FROM trabajadors
            //         INNER JOIN modelos ON trabajadors.id = modelos.trabajador_id
            //         WHERE modelos.id = fuerza_trabs.modelo_id   
            //     )
            // )');

            //sin terminar
            // $table->integer('plant_cub_ant');

            // $table->integer('bajas_period');

            // $table->integer('altas_period');

            // $table->integer('plant_cubierta_act');

            // $table->integer('trab_out_plant');

            // $table->integer('niv_sup')-> default(Trabajador::where('nivel_escolar', 'Nivel Superior')-> count());
            // $table->integer('med_sup')-> default(Trabajador::where('nivel_escolar', 'Medio Superior')-> count());
            // $table->integer('tec_med')-> default(Trabajador::where('nivel_escolar', 'Técnico Medio')-> count());
            // $table->integer('doce_grad')-> default(Trabajador::where('nivel_escolar', 'menos 12.grado')-> count());
            // $table->integer('noveno_grado')-> default(Trabajador::where('nivel_escolar', 'menos 9.grado')-> count());

            // $table->integer('men_treinta');
            // $table->integer('treint_cinc');
            // $table->integer('cinc_sesenta');
            // $table->integer('may_sesenta');


            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fuerza_trabs');
    }
};
