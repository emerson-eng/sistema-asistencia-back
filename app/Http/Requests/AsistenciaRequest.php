<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AsistenciaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true
        ;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id_estudiante'  => 'required|integer|exists:students,id_estudiante',
            'id_trabajador'  => 'required|integer|exists:trabajadores,id_trabajador',
            'fecha'          => 'required|date',
            'hora_entrada'   => 'nullable|date_format:H:i:s',
            'hora_salida'    => 'nullable|date_format:H:i:s',
            'estado'         => 'required|string|max:20',
            'observacion'    => 'nullable|string|max:150',
        ];
    }
}
