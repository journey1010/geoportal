<?php

namespace App\Http\Requests\ArticuloServicio;

use App\Http\Requests\Template;
use Illuminate\Validation\Rule;
class Revisar extends Template
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'id' => 'required|integer',
            'estado' => 'required|in:1,2', // 1: Aprobado, 2: Rechazado
            'motivo_rechazo' => ['nullable', Rule::requiredIf(request()->estado == 2), 'string', 'max:500']
        ];
    }

    public function messages(): array
    {
        return [
            'motivo_rechazo.required' => 'Debe ingresar un motivo!!!'
        ];
    }
}