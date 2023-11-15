<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTecnicoRequest extends FormRequest
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
            "persona_id"=>"required",
            "telefono"=>"required|digits:8|numeric",
            "rol"=>"required",
            "correo"=>"required|email:rfc,dnsmax:30|min:5|string",
            "password"=>"required"

        ];
    }
}
