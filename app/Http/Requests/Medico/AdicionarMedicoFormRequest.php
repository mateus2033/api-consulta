<?php

namespace App\Http\Requests\Medico;

use Illuminate\Foundation\Http\FormRequest;

class AdicionarMedicoFormRequest extends FormRequest
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
            'especialidade' => 'required|string|max:255',
            'cidade_id' => 'required|int|min:1|exists:cidades,id'
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
            'min' => 'Esse campo deve deve conter apenas inteiros positivos.',
            'max' => 'Esse campo deve conter no máximo 255 caracteres.',
            'int' => 'Esse campo deve deve conter apenas inteiros positivos.',
            'exists' => 'Cidade não encontrada.'
        ];
    }
}