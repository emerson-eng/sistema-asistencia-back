<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SeccionRequest;
use App\Models\Seccion;

class SeccionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $seccions=Seccion::all();
        return response()->json($seccions);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SeccionRequest $request)
    {
        $seccion= Seccion::create($request->validated());
        return response()->json(['msg' => 'Registrado', 'data' => $seccion], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $Seccion=Seccion::findOrFail($id);
        return response()->json($Seccion);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SeccionRequest $request, string $id)
    {
        $Seccion=Seccion::findOrFail($id);
        $Seccion->update($request->all());
        return response()->json(['msg' => 'Actualizado', 'data' => $Seccion]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $Seccion=Seccion::findOrFail($id);
        $Seccion->delete();
        return response()->json(['msg' => 'Eliminado']);
    }
}
