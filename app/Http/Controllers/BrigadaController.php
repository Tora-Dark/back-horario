<?php

namespace App\Http\Controllers;

use App\Models\Brigada;
use Illuminate\Http\Request;

class BrigadaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brigadas = Brigada::with('clases')->get();
        return response()->json($brigadas);
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
        $brigada = new Brigada();
        $brigada->nombre = $request->nombre;
        $brigada->save();
        $data = [
            'message'=>'Brigada creada satisfactoriamente',
            'Brigada'=> $brigada
        ];
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Brigada $brigada)
    {
        return response()->json($brigada);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brigada $brigada)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Brigada $brigada)
    {
        $brigada->nombre = $request->nombre;

        $brigada->save();

        $data = [
            'message'=>'Brigada editada satisfactoriamente',
            'Brigada'=> $brigada
        ];
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brigada $brigada)
    {
        $brigada->delete();
        $data = [
            'message'=>'Brigada editada satisfactoriamente',
            'Brigada'=> $brigada
        ];
        return response()->json($data);
    }

    public function attach(Request $request){


    }
}
