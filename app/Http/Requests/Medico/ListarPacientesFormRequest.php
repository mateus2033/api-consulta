<?php

namespace App\Http\Requests\Medico;

use Illuminate\Foundation\Http\FormRequest;

class ListarPacientesFormRequest extends FormRequest
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
            'nome' => 'nullable|string',
            'apenas_agendadas' => 'nullable|bool',
            'page' => 'nullable|int|min:1',
            'perpage' => 'nullable|int|min:5',
            'paginate' => 'nullable|bool',
        ];
    }

    public function prepareForValidation()
    {   
        if ($this->has('paginate')) {
            $this->merge([
                'paginate' => filter_var($this->input('paginate'), FILTER_VALIDATE_BOOLEAN),
            ]);
        }

        if ($this->get('nome') === "null" || $this->get('nome') === "") {
            $this->merge([
                'nome' => null,
            ]);
        }

        if ($this->has('apenas_agendadas')) {
            $this->merge([
                'apenas_agendadas' => filter_var($this->input('apenas_agendadas'), FILTER_VALIDATE_BOOLEAN),
            ]);
        }
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return [
            'string' => 'Esse campo deve ser somente strings.',
            'int' => 'Esse campo deve conter apenas inteiros.',
            'paginate.bool' => 'Esse campo deve ser booleano.',
            'perpage.min' => 'Valor minímo de registros por página aceito é 10.',
            'page.min' => 'Valor minímo de páginas aceito é 1.'
        ];
    }
}