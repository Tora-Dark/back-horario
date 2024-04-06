<?php

namespace App\Http\Controllers;

use App\Models\Asignatura;
use Illuminate\Http\Request;

class AsignaturaController extends Controller
{
    public function index()
    {
        $asignaturas = Asignatura::all();

        return response()->json($asignaturas);
    }

    public function create()
    {
        return view('asignaturas.create');
    }

    public function store(Request $request)
    {
        $asignatura = new Asignatura();
        $asignatura->nombre = $request->nombre;
        $asignatura->siglas = $request->siglas;
        $asignatura->color = $request->color;


        $asignatura->save();

        $data = [
            'message'=>'Asignatura creada satisfactoriamente',
            'Asignatura'=> $asignatura
        ];

        return response()->json($data);
    }

    public function show(Asignatura $asignatura)
    {


      return response()->json($asignatura);
    }

    public function edit(Asignatura $asignatura)
    {
        return view('asignaturas.edit', compact('asignatura'));
    }

    public function update(Request $request, Asignatura $asignatura)
    {
        $asignatura->nombre = $request->nombre;
        $asignatura->siglas = $request->siglas;
        $asignatura->color = $request->color;
        $asignatura->save();

        $data = [
            'message'=>'Asignatura editada satisfactoriamente',
            'Asignatura'=> $asignatura
        ];

        return response()->json($data);
    }

    public function destroy(Asignatura $asignatura)
    {
        $asignatura->delete();

 $data = [
            'message'=>'Asignatura eliminada satisfactoriamente',
            'Asignatura'=> $asignatura
        ];
        return response()->json($data);
    }}
