<?php

namespace App\Http\Controllers;

use App\Models\BalanceDeCarga;
use Illuminate\Http\Request;

class BalanceDeCargaController extends Controller
{
    public function index($id)
    {
        $balance_de_carga = BalanceDeCarga::with('asignatura','horario') ->where('horario_id', $id)->get();

        return response()->json($balance_de_carga);
    }

    public function store(Request $request)
    {
        $balance_de_carga = BalanceDeCarga::create($request->all());

        return response()->json($balance_de_carga, 201);
    }

    public function show($id)
    {
        $balance_de_carga = BalanceDeCarga::findOrFail($id);
        return response()->json($balance_de_carga);
    }

    public function update(Request $request, $id)
    {
        $balance_de_carga = BalanceDeCarga::findOrFail($id);
        $balance_de_carga->update($request->all());
        return response()->json($balance_de_carga, 200);
    }

    public function delete($id)
    {
        BalanceDeCarga::destroy($id);
        return response()->json(null, 204);
    }//
}
