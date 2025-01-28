<?php

namespace App\Http\Resources\Medico;

use Illuminate\Http\Resources\Json\JsonResource;

class AdicionarMedicoResource extends JsonResource
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
            'nome' =>  $this->nome,
            'especialidade' => $this->especialidade,  
            'cidade' => [
                'id' => $this->cidade->id,
                'nome' => $this->cidade->nome,
                'estado' => $this->cidade->estado  
            ]
        ];
    } 
}