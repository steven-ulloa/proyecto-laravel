<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Models\User;

class UpdateUserRequest extends FormRequest
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
        $id = $this->segment(2); // Obtener el valor del segundo segmento de la URL (el ID de usuario)
        return [
            'name' => 'required|String',
            // 'email' => 'required|String|email|unique:users,email',Rule::unique('users')->ignore($id),
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($id),
            ],
            'password' => 'required',
            'cedula' => [
                'required',
                'digits:10',
                Rule::unique('users')->ignore($id),
                function ($value, $fail) use ($id) {
                    $existingUser = User::where('cedula', $value)
                        ->where('id', '!=', $id)
                        ->first();
                    if ($existingUser) {
                        $fail('La cedula ingresada ya está en uso por otro usuario.');
                    }
                },
            ],
            'username' => 'required|unique:users,username,'.$id,
            'apellido' => 'required',
            'edad' => 'required|numeric',
            'fecha' => 'required|date',
            'provincia_id' => 'required',
            'ciudad_id' => 'required',
            'direccion' => 'required',
            'genero' => 'required',
            'estado_civil' => 'required',
            'hobbies' => 'required',
            'foto' => 'sometimes|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];
    }
}
