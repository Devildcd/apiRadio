<?php

namespace App\Models;

use App\Http\Rules\EmisoraExists;
use Illuminate\Database\Eloquent\Model;
use App\Models\Emisora;
use App\Models\Modelo;
use Illuminate\Validation\Rule;


class Trabajador extends Model
{
    public function emisora() {
        return $this->belongsTo(Emisora::class);
    }

    public function modelos() {
        return $this-> hasMany(Modelo::class);
    }

    protected $fillable = [
        'emisora_id',
        'nombre',
        'ci',
        'provincia',
        'municipio',
        'direccion',
        'edad',
        'sexo',
        'nivel_escolar',
        'categoria_ocup',
        'org_politicas',
        'etnia',
        'tipo_contrato',
        'tiempo_ICRT',
        'salida_pais',
        'area_geo',
        'plantilla',
        'fecha_alta',
        'fecha_baja',
    ];

    public static $nivel_escolarValues = [
        'Nivel Superior',
        'Medio Superior',
        'Técnico Medio',
        'menos 12.grado',
        'menos   9.grado'
    ];

    public static $categoria_ocupValues = [
        'Cuadros',
        'Administración',
        'Obreros',
        'Servicios',
        'Técnicos',
        'Artístas',
        'Periodístas',
        'Escritores'
    ];

    public static $org_politicasValues = [
        'PCC',
        'UJC',
        'FMC'
    ];

    public static $etniaValues = [
        'Blancos',
        'Negros',
        'Mulatos'
    ]; 

    public static function rules() {

        return  [
            'emisora_id'=>[
                'required',
                new EmisoraExists
                
            ],

            'nombre'=>[
                'required'
            ],

            'ci'=>[
                'required',
                'numeric',
                'digits:11',
                'regex:/^[1-9][0-9]{10}$/',
            ],

            'provincia'=>[
                'required'
            ],

            'municipio'=>[
                'required'
            ],

            'direccion'=>[
                'required'
            ],

            'edad'=>[
                'required',
                'numeric',
                'digits:2',
            ],

            'sexo'=>[
                'required'
            ],

            'nivel_escolar' => [
                'required',
            ],
            'categoria_ocup' => [
                'required',
            ],
            'org_politicas' => [
                'required',
            ],
            'etnia' => [
                'required',
            ],
            'tipo_contrato' => [
                'required',
            ],
            'tiempo_ICRT' => [
                'required',
            ],
            'salida_pais' => [
                'nullable',
            ],
            'area_geo' => [
                'nullable',
            ],
            'plantilla' => [
                'nullable',
            ],
            'fecha_alta' => [
                'nullable',
            ],
            'fecha_baja' => [
                'nullable',
            ],

        ];
        
    }
}
