<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePersonaRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            "nombre"=>"required|max:20|min:3|string|regex:/^[\pL\s\-]+$/u",
            "apellidos"=>"required|max:40|min:3|string|regex:/^[\pL\s\-]+$/u",
            "carnet"=>"required|numeric|digits_between:7,12",
            "ciudad_id"=>"required",
            "direccion"=>"required|max:70|min:5|string",
            "telefono"=>"required|digits:8|numeric",
            "correo"=>"required|email:rfc,dns|max:50|min:5|string",
        ];
    }
}
