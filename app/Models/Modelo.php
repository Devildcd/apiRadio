<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Trabajador;
use App\Http\Rules\TrabajadorExists;
use Illuminate\Validation\Rule;
use App\Models\FuerzaTrab;


class Modelo extends Model
{
    //relacion de trabajador con modelo
    public function trabajador() {
        return $this-> belongsTo(Trabajador::class);
    }

    //relacion de modelo con fuerza_trabs
    public function fuerza_trabs() {
        return $this-> hasOne(FuerzaTrab::class);
    }

    protected $fillable = ['trabajador_id','nombre', 'especialidad', 'marca_tiempo', 'periodo'];

    public static $especialidadValues = [
        'Política de Empleo',
        'Salud y Seguridad',
        'Salario'
    ];

    public static $nombreValues = [
        'Fuerza de Trabajo',
        'Ausentismo',
        'Violaciones',
        'Salida del país',
        'Maestrías',
        'Artistas',
        'Servicio Social',
        'Pluriempleo',
        'Jubilados',
        'Potencial de Empleo',
        'Dengue-Covid-Vacunación'
    ];

    public static $marca_tiempoValues = [
        'trimestre',
        'semestre'
    ];

    public static $periodoValues = [
        'diciembre-febrero',
        'marzo-mayo',
        'junio-agosto',
        'septiembre-noviembre',
        'diciembre-mayo',
        'junio-noviembre'
        
    ];

    public static function rules() {

        return [
            'trabajador_id'=> ['required',
            new TrabajadorExists()
            ],

            'nombre'=> ['required',
            Rule::in(self:: $nombreValues),
            ],

            'especialidad'=> ['required',
            Rule::in(self::$especialidadValues),
            ],

            'marca_tiempo'=> ['required',
            Rule::in(self:: $marca_tiempoValues),
            ],

            'periodo'=> ['required',
            Rule::in(self:: $periodoValues),
            ]
        ];
    }

}
