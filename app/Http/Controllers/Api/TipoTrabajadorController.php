<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\TipoTrabajadorRequest;
use Illuminate\Http\Request;
use App\Models\TipoTrabajador;

class TipoTrabajadorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tipos=TipoTrabajador::all();
        return response()->json($tipos);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TipoTrabajadorRequest $request)
    {
        $tipo = TipoTrabajador::create($request->validated());
        return response()->json(['msg' => 'Registrado', 'data' => $tipo], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(TipoTrabajador $tipo)
    {
        $tipo=TipoTrabajador::findOrFail($tipo->id);
        return response()->json($tipo);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TipoTrabajadorRequest $request, string $id)
    {
        $TipoTrabajador=TipoTrabajador::findOrFail($id);
        $TipoTrabajador->update($request->all());
        return response()->json(['msg' => 'Actualizado', 'data' => $TipoTrabajador]);
    }

    public function destroy($id)
{
    $tipo = TipoTrabajador::find($id);

    if (!$tipo) {
        return response()->json(['message' => 'Tipo no encontrado'], 404);
    }

    // ELIMINAR TRABAJADORES RELACIONADOS
    $tipo->trabajadores()->delete();

    // AHORA ELIMINAR EL TIPO
    $tipo->delete();

    return response()->json(['message' => 'Tipo eliminado con éxito']);
}
 }
    