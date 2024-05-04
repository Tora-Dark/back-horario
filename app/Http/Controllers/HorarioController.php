<?php

namespace App\Http\Controllers;

use App\Models\Brigada;
use App\Models\Clase;
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
        $clases = Clase::with('asignatura', 'local', 'brigadas')->get();
        $clasesHorario = $horario->clases;
        $mergedClasses = [];

        foreach ($clases as $clase) {
            foreach ($clasesHorario as $clase2) {

                if (($clase->id == $clase2->id)) {
                    $mergedClasses[] = $clase;
                }
            }
        }

        $data = [
            'clases' => $mergedClasses,
            'horario' => $horario,

        ];
        return response()->json($data);
    }

    public function store(Request $request)
    {
        $horario = new Horario();
        $horariolast = Horario::latest('id')->first();
        $horario->semana = $request->semana +  $horariolast->semana;
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

    public function destroy($id)
    {
        $horario = Horario::find($id);
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


    public function Getmatriz(Horario $horario, Clase $clase)
    {

        $clases  = $horario->clases()->with('brigadas')->get();
        $brigadas = $clase->brigadas()->get();
        $matrizDisponibilidad = [];
        for ($i = 0; $i < 6; $i++) {
            $matrizDisponibilidad[$i] = array_fill(0, 5, true);
        }
        $cont = 0;
        $brigadas_array = [];
        foreach ($brigadas as $brigada) {
            $brigadas_array[$cont] = $brigada;
            $cont++;
        }
        $cont2 = 0;
        foreach ($clases as $clase1) {
            $brigadas2 = $clase1->brigadas;
            foreach ($brigadas2 as $brig) {

                foreach ($brigadas as $brigada) {


                    if ($brig->id == $brigada->id || $clase1->id == $clase->id) {
                        $diaSemana = $clase1->fecha;
                        $turno = $clase1->turn;
                        $matrizDisponibilidad[$turno - 1][$diaSemana - 1] = false;
                    }
                }
            }
        }
        $data = [

            "Matriz Disponiblidad" => $matrizDisponibilidad,

        ];
        return response()->json($matrizDisponibilidad);
    }
}
