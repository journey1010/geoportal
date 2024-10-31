<?php

namespace App\Http\Requests\ArticuloServicio;

use App\Http\Requests\Template;

class Store extends Template
{
    public function rules(): array
    {
        return [
            'authorName' => 'required|string',
            'itemName' => 'required|string|max:255',
            'description' => 'required|string',
            'contentType' => 'required|string',
            'file' => 'nullable|string',
            'serviceUrl' => 'nullable|string',
            'publishDate' => 'required|date',
            'entidadId' => 'required|integer'
        ];
    }

    public function messages(): array
    {
        return [
            'itemName.required' => 'Nombre de item es requerido'
        ];
    }
}
