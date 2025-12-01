<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TrabajadoreRequest;
use Illuminate\Http\Request;
use App\Models\Trabajador;

class TrabajdorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trabajadores = Trabajador::all();
        return response()->json($trabajadores);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TrabajadoreRequest $request)
    {
        $trabajador = Trabajador::create($request->all());
        return response()->json(['message' => 'Trabajador creado con exito', 'data' => $trabajador], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $trabajador = Trabajador::find($id);
        if (!$trabajador) {
            return response()->json(['message' => 'Trabajador no encontrado'], 404);
        }
        return response()->json($trabajador);
    }


        public function update(TrabajadoreRequest $request, string $id)
    {
        $Seccion=Trabajador::findOrFail($id);
        $Seccion->update($request->all());
        return response()->json(['msg' => 'Actualizado', 'data' => $Seccion]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function destroy(string $id)
    {
       $trabajador = Trabajador::find($id);
       if ($trabajador) {
        $trabajador->delete();
        return response()->json(['message' => 'Trabajador eliminado con exito']);;
       }
       return response()->json(['message' => 'Trabajador no encontrado'], 404);
    }
}
