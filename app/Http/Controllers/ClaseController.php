<?php

namespace App\Http\Controllers;

use App\Models\Clase;
use Illuminate\Http\Request;

class ClaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $clases = Clase::with('asignatura','local','horario','brigadas')->get();
        //return $clases to json response


        return response()->json($clases);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $clase = new Clase();
        $clase->turn = $request->nombre;
        $clase->tipo = $request->tipo;
        $clase->turn = $request->turn;
        $clase->fecha = $request->fecha;
        $clase->asignatura_id = $request->asignatura_id;
        $clase->local_id = $request->local_id;

     $clase->save();

     $clase->brigadas()->sync($request->brigadas);
     $clase->horario()->attach($request->semana);

     $data = [

        'message'=>'Clase creada satisfactoriamente',

        'Clase'=> $clase
    ];
    return response()->json($data);}
    /**
     * Display the specified resource.
     */
    public function show(Clase $clase)
    {

        $data = [

        'Clase'=> $clase,
        'asignatura'=> $clase->asignatura,
        'local'=>$clase->local,
        'brigada'=> $clase->brigadas
        ];
        return response()->json($data);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Clase $clase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Clase $clase)
    {
        $clase->turn = $request->nombre;
        $clase->tipo = $request->horas;
        $clase->turn = $request->turn;
        $clase->fecha = $request->fecha;
        $clase->asignatura_id = $request->asignatura_id;
        $clase->local_id = $request->local_id;
        $clase->brigada_id = $request->brigada_id;
     $clase->save();

     $data = [
        'message'=>'Clase editada satisfactoriamente',
        'Clase'=> $clase
    ];
    return response()->json($data);}
    /**
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Clase $clase)
    {

        $clase->delete();

        $data = [
            'message'=>'Clase editada satisfactoriamente',
            'Clase'=> $clase
        ];
        return response()->json($data);
    }

public function attach(Request $request){

    $clase = Clase::find($request->clase_id);

    $clase->brigadas()->attach($request->brigada_id);
   // $clase->brigadas()->sync($request->brigada_id);
    $data =[
        'message'=> 'Brigada attached succesfuly',
        'Clase'=> $clase

    ];
    return response()->json($data);
}


}
