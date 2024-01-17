<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Horario;

class HorarioController extends Controller
{
    public function index()
    {
        $horarios = Horario::with('clases')->get();


        return response()->json($horarios);
    }

    public function show(Horario $horario)
    {
        return response()->json($horario);
    }

    public function store(Request $request)
    {
        $horario = new Horario();
        $horario->semana = $request->semana;
        $horario->save();


        $data = [
            'message' => 'Horario creado satisfactoriamente',
            'Horario' => $horario
        ];
        return response()->json($data);
    }

    public function update(Request $request, $horario)
    {
        $horario->semana = $request->semana;
        $horario->save();


        $data = [
            'message' => 'Horario editado satisfactoriamente',
            'Horario' => $horario
        ];
        return response()->json($data);
    }

    public function destroy($horario)
    {

        $horario->delete();

        $data = [
            'message' => 'Horario eliminado satisfactoriamente',
            'Horario' => $horario
        ];
        return response()->json($data);
    }

    public function attach(Request $request)
    {

        $horario = Horario::find($request->horario_id);

        $horario->clases()->attach($request->clase_id);

        $data = [
            'message' => 'Clase attached succesfuly',
            'Horario' => $horario

        ];
        return response()->json($data);
    }
}
