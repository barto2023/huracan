<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateProveedorRequest extends FormRequest
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
            "ciudad_id"=>"required",
            "razon_social"=>"required|max:40|min:5|string",
            "nit"=>"required|numeric|digits_between:7,12",
            "telefono"=>"required|digits:8|numeric",
            "direccion"=>"required|max:70|min:5|string",
            "correo"=>"required|email:rfc,dns|max:50|min:5|string"
        ];
    }
}
