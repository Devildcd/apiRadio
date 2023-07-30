<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Trabajador;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ausencias', function (Blueprint $table) {
            $table->id();

            $table->foreignId('modelo_id')-> constrained('modelos');

            $table->date('fecha');

            $table->enum('mes', ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 
                                    'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre']);

            $table->integer('cant_trabj')-> default(Trabajador::where('plantilla', true)-> count());
            $table->string('cant_dias_lab');
            $table->string('fond_max_util');
            $table->string('fon_noUtil');

            //Si vacaciones es false, fechaI y F no se muestran
            $table->boolean('vacaciones');
            $table->date('fechaI')-> nullable()-> defaultIf('vacaciones', false, null);
            $table->date('fechaF')-> nullable()-> defaultIf('vacaciones', false, null);

            //campos para ausencias justificadas
            $table->boolean('ausJust');
            $table->json('dias_ausJ')->nullable()-> defaultIf('ausJust', false, null);
            //campos para ausencias injustificadas
             $table->boolean('ausInjust');
            $table->json('dias_ausI')-> nullable();
            //campos para enfermedad con certificado
            $table->boolean('enfer_cert');
            $table->date('fechaI_cert')-> nullable()-> defaultIf('enfer_cert', false, null);
            $table->date('fechaF_cert')-> nullable()-> defaultIf('enfer_cert', false, null);
          
            $table->boolean('enfer_sinCert');

            $table->boolean('accidenteT');
            $table->text('descripcion')-> nullable()-> default('accidenteT', false, null);
            $table->boolean('licenciaM');
            $table->boolean('licenciaNo_retr');

            $table->boolean('int_dias_compl');
            $table->json('dias_int')-> nullable()-> default('int_dias_compl', false, null);
            $table->boolean('decreto91');
            $table->float('tiempo_realT');

            $table->boolean('int_jornad');
            $table->json('dias_int_jornad')-> nullable()-> default('int_jornad', false, null);

            $table->boolean('infr_horario');
            $table->json('dias_infHorario')-> nullable()-> default('infr_horario', false, null);

            $table->boolean('sal_out_hora');
            $table->json('dias_sal_out')-> nullable()-> default('sal_out_hora', false, null);

            $table->boolean('horas_ext');
            $table->json('diasH_ext')-> nullable()-> default('horas_ext', false, null);
              
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ausencias');
    }
};
