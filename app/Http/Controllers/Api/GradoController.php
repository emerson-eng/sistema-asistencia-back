<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\GradoRequest;
use App\Models\Grado;

class GradoController extends Controller
{
    public function index()
    {
        $grados = Grado::all();
        return response()->json($grados);
    }

    public function store(GradoRequest $request)
    {
        $grado = Grado::create($request->validated());
        return response()->json([
            'msg' => 'Registrado',
            'data' => $grado
        ], 201);
    }

    public function show($id)
    {
        $grado = Grado::findOrFail($id);
        return response()->json($grado);
    }

    public function update(GradoRequest $request, string $id)
    {
        $grado = Grado::findOrFail($id);
        $grado->update($request->validated());
        return response()->json([
            'msg' => 'Actualizado',
            'data' => $grado
        ]);
    }


    public function destroy(string $id)
    {
        $grado = Grado::find($id);

        if (!$grado) {
            return response()->json(['message' => 'Grado no encontrado'], 404);
        }

        // ELIMINAR SECCIONES RELACIONADAS
        $grado->secciones()->delete();

        // AHORA ELIMINAR EL GRADO
        $grado->delete();

        return response()->json(['message' => 'Grado eliminado con éxito']);
    }

    
}
 