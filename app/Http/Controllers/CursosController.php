<?php


namespace App\Http\Controllers;

use App\Models\Cursos;
use Illuminate\Http\Request;

class CursosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cursos = Cursos::all();

        return response()->json($cursos);
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
        $curso = new Cursos();
        $curso->nombre = $request->nombre;
        $curso->save();


        $data = [
            'message' => 'Curso creado satisfactoriamente',
            'Curso' => $curso
        ];
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Cursos $cursos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cursos $cursos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cursos $curso)
    {
        $curso->nombre = $request->nombre;
        $curso->save();


        $data = [
            'message' => 'Curso creado satisfactoriamente',
            'Curso' => $curso
        ];
        return response()->json($data);
    }

/**
 * Remove the specified resource from storage.
 */
public function destroy(Cursos $curso)
{
    $curso->delete();

    $data = [
        'message' => 'curso eliminado satisfactoriamente',
        'curso' => $curso
    ];
    return response()->json($data);
}
}
