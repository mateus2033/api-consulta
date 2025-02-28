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
        JsonResource::withoutWrapping();
        return [
            'id' => $this->id, 
            'nome' => $this->nome, 
            'cpf' => $this->cpf, 
            'celular' => $this->celular,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
            'user' => [
                'email' => $this->user->email,
                'type' => $this->user->type
            ]
        ];
    } 
}