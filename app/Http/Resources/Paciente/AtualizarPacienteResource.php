<?php

namespace App\Http\Resources\Paciente;

use Illuminate\Http\Resources\Json\JsonResource;

class AtualizarPacienteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id, 
            'nome' => $this->nome, 
            'cpf' => $this->cpf, 
            'celular' => $this->celular,
            'updated_at' => $this->updated_at
        ];
    } 
}