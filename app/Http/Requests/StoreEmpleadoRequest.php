<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmpleadoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre' => ['required','string'],
            'email' => ['required','email','string'],
            'sexo' => ['required','string'],
            'descripcion' => ['required','string'],
            'boletin' => ['required', 'boolean'],
            'area' => ['required', 'array']
        ];
    }
}