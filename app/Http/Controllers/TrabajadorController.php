<?php

namespace App\Http\Controllers;

use App\Models\Trabajador;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class TrabajadorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trabajadores = Trabajador::all();

        return response()-> json($trabajadores);
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request-> all(), Trabajador::rules());

        if($validator-> fails()) {
            return response()-> json([
                'message'=> 'Error de validación',
                'error'=> $validator-> errors()
            ], 422);
        }

        //Validando q el campo ci no se repita en la BD
        $query = Trabajador:: select('ci')-> get();
        foreach($query as $registro) {
            if($registro-> ci === $request-> ci){
                return response()-> json([
                    'mesagge'=> 'EL ci ya se encuentra en la Base de Datos'
                ]);
            }else {
                $trabajador = Trabajador:: create($request->all());

                return response()-> json([
                    'message'=> 'Trabajador creado exitosamente',
                    'trabajador'=> $trabajador
                ]);
            }
        }

       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $trabajador = Trabajador::find($id);

        if(!$trabajador) {
            return response()-> json([
                'message'=> 'Trabajador no encontrado'
            ], 404);
        }

        return response()-> json($trabajador);
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
        $trabajador = Trabajador::find($id);

        $validator = Validator::make($request-> all(), Trabajador:: rules()); 

        if(!$trabajador) {
            return response()-> json([
                'message'=> 'Trabajador no encontrado'
            ], 404);
        }

        if($validator-> fails()) {
            return response()-> json([
                'message'=> 'Error de validación',
                'error'=> $validator-> errors()
            ], 422);
        }

        $trabajador-> update($request-> all());

        return response()-> json([
            'message'=> 'Trabajador editado exitosamente',
            'trabajador'=> $trabajador
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
       $trabajador = Trabajador::find($id);

       if(!$trabajador) {
        return response()-> json([
            'message'=> 'Trabajador no encontrado'
        ], 404);
    }

    $trabajador-> delete();

    return response()-> json([
        'message'=> 'Trabajador eliminado correctamente',
        'trabajador'=> $trabajador
    ]);
    }
}
