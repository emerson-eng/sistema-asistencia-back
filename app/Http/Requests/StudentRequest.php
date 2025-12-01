<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StudentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'dni'               => 'required|string|max:8|unique:students,dni',
            'nombres'           => 'required|string|max:100',
            'apellidos'         => 'required|string|max:100',
            'fecha_nacimiento'  => 'required|date',
            'genero'            => 'required|in:M,F,O',
            'direccion'         => 'nullable|string|max:150',
            'telefono'          => 'nullable|string|max:20',
            'estado'            => 'required|in:activo,inactivo',
            'id_grado'          => 'required|integer|exists:grados,id_grado',
        ];
    }
}
