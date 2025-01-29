<?php

namespace App\Http\Requests\Consulta;

use Illuminate\Foundation\Http\FormRequest;

class AgendarContultaFormRequest extends FormRequest
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
            'medico_id' => 'required|int|exists:medicos,id',
            'paciente_id' => 'required|int|exists:pacientes,id',
            'data_contula' => 'required|date_format:Y-m-d H:i:s|after_or_equal:today'
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
            'int' => 'Esse campo deve conter apenas positivos inteiros.',
            'data_format' => 'Formato de data inválido.',
            'after_or_equal' => 'Data inválida, a data da consulta deve ser igual ou superior a hoje.',
            'medico_id.exists' => 'Médico não encontrado.',
            'paciente_id.exists' => 'Paciente não encontrado.'
        ];
    }
}