<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Asistencia;
use App\Http\Requests\AsistenciaRequest;

class AsistenciaController extends Controller
{
    public function index()
    {
        $asistencia = Asistencia::all();
        return response()->json($asistencia);
    }

    public function store(AsistenciaRequest $request)
    {
        $asistencia = Asistencia::create($request->validated());
        return response()->json([
            'msg' => 'Registrado',
            'data' => $asistencia
        ], 201);
    }

    public function show(string $id)
    {
        $asistencia = Asistencia::findOrFail($id);
        return response()->json($asistencia);
    }

    public function update(Request $request, string $id)
    {
        $asistencia = Asistencia::findOrFail($id);
        $asistencia->update($request->all());

        return response()->json([
            'msg' => 'Actualizado',
            'data' => $asistencia
        ]);
    }

    public function destroy(string $id)
    {
        $asistencia = Asistencia::findOrFail($id);
        $asistencia->delete();

        return response()->json(['msg' => 'Eliminado']);
    }
}
