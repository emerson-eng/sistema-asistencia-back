<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Http\Requests\StudentRequest;
use Illuminate\Http\Request;
use App\Models\Student;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students=Student::all();
        return response()->json($students);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StudentRequest $request)
    {
        $student = Student::create($request->validated());
        return response()->json(['msg' => 'Registrado', 'data' => $student], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $student = Student::find($id);
        if (!$student) {
            return response()->json(['message' => 'Student no encontrado'], 404);
        }
        return response()->json($student);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update( StudentRequest $request,Student $student)
    {
        $student->update($request->validated());
        return response()->json(['msg' => 'Actualizado', 'data' => $student]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student = Student::find($id);
        if ($student) {
            $student->delete();
            return response()->json(['message' => 'Student eliminado con exito']);;
           }
           return response()->json(['message' => 'Student no encontrado'], 404);
    }
}
