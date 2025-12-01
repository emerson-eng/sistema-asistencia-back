<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TrabajadoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'dni'=>'required|string',
            'nombres'=>'required|string|max:100',
            'apellidos'=>'required|string|max:100',
            'cargo'=>'required|string|max:50',
            'telefono'=>'required|string|max:20',
            'direccion'=>'required|string|max:150',
            'id_tipo'   => 'required|integer|exists:tipo_trabajadores,id_tipo'
        ];
    }
}
