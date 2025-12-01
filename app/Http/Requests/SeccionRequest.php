<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeccionRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id_grado'       => 'required|integer|exists:grados,id_grado',
            'nombre_seccion' => 'required|string|max:50',
            'capacidad'      => 'required|integer|min:1',
            'anio_lectivo'   => 'required|integer|min:2000|max:2100',
        ];
    }
}
