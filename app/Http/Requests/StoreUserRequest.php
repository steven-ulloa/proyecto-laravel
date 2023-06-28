<?php

namespace App\Http\Requests;
use Illuminate\Http\Request;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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

            'name' => 'required|String',
            'email' => 'required|String|email|unique:users,email,regex:/^.+@.+\..+$/',
            'password' => 'required|String',
            'cedula' => 'required|digits:10|unique:users,cedula',//valido si la cedula es unica
            'username' => 'required|unique:users,username',//valido si el username es unico
            'apellido' => 'required',
            'edad' => 'required|numeric',
            'fecha' => 'required|date',
            'provincia_id' => 'required',
            'ciudad_id' => 'required',
            'direccion' => 'required',
            'genero' => 'required',
            'estado_civil' => 'required',
            'hobbies' => 'required',
            'email' => 'required|email|unique:users,email',//valido si el email es unico
            'foto' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}
