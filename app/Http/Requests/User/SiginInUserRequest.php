<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class SiginInUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => 'required|string|email',
            'password' => 'required|string|min:6'
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'email.required' => 'O email é obrigatório.',
            'password.required' => 'A senha é obrigatório.',
            'string' => 'Esse campo deve ser somente strings.',
            'email' => 'Email inválido.',
            'password.min' => 'A senha deve conter no mínimo 6 caracteres.'
        ];
    }
}
