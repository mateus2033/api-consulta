<?php

namespace App\Http\Requests\Consulta;

use Illuminate\Foundation\Http\FormRequest;

class ListarConsultasFormRequest extends FormRequest
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
            'page' => 'nullable|int|min:1',
            'perpage' => 'nullable|int|min:5',
            'paginate' => 'nullable|boolean',
        ];
    }

    public function prepareForValidation()
    {
        if ($this->has('paginate')) {
            $this->merge([
                'paginate' => filter_var($this->input('paginate'), FILTER_VALIDATE_BOOLEAN),
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
            'int' => 'Esse campo deve conter apenas inteiros.',
            'paginate.boolean' => 'Esse campo deve ser booleano.',
            'perpage.min' => 'Valor minímo de registros por página aceito é 10.',
            'page.min' => 'Valor minímo de páginas aceito é 1.'
        ];
    }
}