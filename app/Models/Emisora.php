<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Trabajador;
use App\Http\Rules\UniqueName;

class Emisora extends Model
{
    //relacion entre emisora y trabajadores 
   public function trabajadores() {
    return $this->hasMany(Trabajador::class);
   }

   protected $fillable = [

    'nombre',
    'descripcion'
   ];

   //reglas de validacion
   public static function rules() {

    return [
        'nombre'=> ['required'
    ],
    ];
   }
}
