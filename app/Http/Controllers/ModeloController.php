<?php

namespace App\Http\Controllers;

use App\Models\Modelo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Schema;

class ModeloController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modelos = Modelo::all();

        return response()-> json($modelos);
    }

   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request-> all(), Modelo::rules());

        if($validator-> fails()) {
            return response()-> json([
                'message'=> 'Error de validacion',
                'error'=> $validator->errors()
            ], 422);
        }

        if (!Schema::hasTable('trabajadors')) {
            return response()-> json([
                'message'=> 'Debe insertar un trabajador'
            ]);
        }

        $modelo = new Modelo;
        $modelo->trabajador_id = $request-> trabajdor_id;
        $modelo-> especialidad = $request-> especialidad;
        $modelo-> nombre = $request-> nombre;
        $modelo-> save();

        return response()-> json([
            'message'=> 'Modelo creado correctamente',
            'modelo'=> $modelo
        ]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $modelo = Modelo::find($id);

        if(!$modelo) {
            return response()-> json([
                'message'=> 'Modelo no encontrado',
            ], 404);
        }

        return response()-> json($modelo);
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $modelo = Modelo::find($id);

        if(!$modelo) {
            return response()-> json([
                'message'=> 'Modelo no encontrado'
            ], 404);
        }

        $validator = Validator::make($request-> all(), Modelo:: rules());

        if($validator-> fails()) {
            return response()-> json([
                'message'=> 'Error de validación',
                'error'=> $validator->errors()
            ], 422);
        }

        $modelo->trabajador_id = $request-> trabajdor_id;
        $modelo-> especialidad = $request-> especialidad;
        $modelo-> nombre = $request->nombre;
        $modelo-> save();

        return response()-> json([
            'message'=> 'Modelo actualizado correctamente',
            'modelo'=> $modelo
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $modelo = Modelo::find($id);

       if(!$modelo) {
        return response()-> json([
            'message'=> 'Modelo no encontrado'
        ], 404);
       }

       $modelo-> delete();

       return response()-> json([
        'message'=> 'Modelo eliminado correctamente',
        'modelo'=> $modelo
       ]);
    }
}
