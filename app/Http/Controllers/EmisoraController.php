<?php

namespace App\Http\Controllers;

use App\Models\Emisora;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EmisoraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emisoras = Emisora::all();

        return response()-> json($emisoras);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $validator = Validator::make($request->all(), Emisora::rules());

       if($validator-> fails()) {
        
        return response()-> json([
            'message'=> 'Error de Validacion',
            'error'=> $validator->errors(),
        ],422); 
       }

       $emisora = new Emisora;
       $emisora-> nombre = $request-> nombre;
       $emisora-> descripcion = $request-> descripcion;
       $emisora-> save();
       
       return response()-> json([
            'message'=> 'Emisora creada correctamente',
            'emisora'=> $emisora
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
        $emisora = Emisora::find($id);

        if(!$emisora) {
            return response()-> json([
                'Emisora no encontrada'
            ], 404);
        }

        return response()-> json($emisora);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $validator = Validator::make($request->all(), Emisora::rules());

       if($validator-> fails()) {
        
        return response()-> json([
            'message'=> 'Error de Validacion',
            'error'=> $validator->errors(),
        ],422); 
       }

       $emisora = Emisora::find($id);

       if(!$emisora) {
        return response()-> json([
            'Emisora no encontrada'
        ], 404);
        }

       $emisora-> nombre = $request-> nombre;
       $emisora-> descripcion = $request-> descripcion;
       $emisora-> save();
       
       return response()-> json([
            'message'=> 'Emisora editada correctamente',
            'emisora'=> $emisora
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
        $emisora = Emisora::find($id);

        if(!$emisora) {
            return response()-> json([
                'Emisora no encontrada'
            ], 404);
        }

        $emisora->delete();

        return response()-> json([
            'message'=> 'Emisora eliminada correctamente',
            'emisora'=> $emisora
        ]);
    }
}
