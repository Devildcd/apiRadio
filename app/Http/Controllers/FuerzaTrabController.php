<?php

namespace App\Http\Controllers;

use App\Models\FuerzaTrab;
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
        $submodelos = FuerzaTrab::all();

        return response()-> json($submodelos);
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request-> all(), FuerzaTrab::rules());

        if($validator-> fails()) {
            return response()-> json([
                'message'=> 'Error de validación',
                'error'=> $validator-> errors()
            ], 422);
        }

        $submodelo = FuerzaTrab:: create($request->all());

        return response()-> json([
                    'message'=> 'Trabajador creado exitosamente',
                    'trabajador'=> $submodelo
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
        $submodelo = FuerzaTrab::find($id);

        if(!$submodelo) {
            return response()-> json([
                'message'=> 'Trabajador no encontrado'
            ], 404);
        }

        return response()-> json($submodelo);
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
        $submodelo = FuerzaTrab::find($id);

        $validator = Validator::make($request-> all(), FuerzaTrab:: rules()); 

        if(!$submodelo) {
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

        $submodelo-> update($request-> all());

        return response()-> json([
            'message'=> 'Trabajador editado exitosamente',
            'trabajador'=> $submodelo
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
        $submodelo = FuerzaTrab::find($id);

       if(!$submodelo) {
        return response()-> json([
            'message'=> 'Trabajador no encontrado'
        ], 404);
    }

    $submodelo-> delete();

    return response()-> json([
        'message'=> 'Trabajador eliminado correctamente',
        'trabajador'=> $submodelo
    ]);
    }
}
