<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Local;

class LocalController extends Controller
{
    public function index()
    {
        $locales = Local::all();
        return response()->json($locales);
    }

    public function show($id)
    {
        $local = Local::find($id);

        return response()->json($local);
    }

    public function store(Request $request)
    {
        $local = new Local();
        $local->nombre = $request->nombre;
         $local->save();

         $data = [
            'message'=>'Local editada satisfactoriamente',
            'Local'=> $local
        ];

        return response()->json($data); }



    public function update(Request $request, Local $local)
    {

        $local->nombre = $request->nombre;

        $local->save();
        $data = [
            'message'=>'Local editada satisfactoriamente',
            'Local'=> $local
        ];

        return response()->json($data); }

    public function destroy(Local $local)
    {

        $local->delete();
        $data = [
            'message'=>'Local eliminada satisfactoriamente',
            'Local'=> $local
        ];

        return response()->json($data);
    }
}
