<?php

namespace App\Http\Requests\Paciente;

use Illuminate\Foundation\Http\FormRequest;

class AdicionarPacienteFormRequest extends FormRequest
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
            'nome' => 'required|string|max:255',
            'cpf' => 'required|string|max:20',
            'celular' => 'required|string|max:20'
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
            'required' => 'Esse campo é obrigatório.',
            'string' => 'Esse campo deve conter apenas caracteres.',
            'nome.max' => 'Esse campo deve conter no máximo 20 caracteres.',
            'cpf.max' => 'Esse campo deve conter no máximo 20 caracteres.',
            'celular.max' => 'Esse campo deve conter no máximo 20 caracteres.',
        ];
    }
}