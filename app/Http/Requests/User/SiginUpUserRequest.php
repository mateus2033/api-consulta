<?php

namespace App\Http\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class SiginUpUserRequest extends FormRequest
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
            'email' => 'required|string|email|unique:users',
            'type' => 'required|in:DOCTOR,CLIENT',
            'password' => 'required|string|min:6',
            'confirmPassword' => 'required|string|same:password'
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
            'required' => 'O campo :attribute é obrigatório.',
            'string' => 'O campo :attribute deve ser um texto.',
            'email' => 'O campo :attribute deve ser um e-mail válido.',
            'unique' => 'O :attribute já está cadastrado.',
            'min' => 'O campo :attribute deve ter no mínimo :min caracteres.',
            'max' => 'O campo :attribute deve ter no máximo :max caracteres.',
            'same' => 'O campo :attribute deve ser igual ao campo :other.',
            'password.min' => 'A senha deve ter no mínimo 6 caracteres.',
            'confirmPassword.same' => 'A confirmação da senha não coincide com a senha.',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'email' => 'e-mail',
            'type' => 'tipo',
            'password' => 'senha',
            'confirmPassword' => 'confirmação da senha',
        ];
    }
}
