<?php

namespace App\Http\Resources\Cidade;

use Illuminate\Http\Resources\Json\JsonResource;

class ListarCidadesRerouce extends JsonResource
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
            'estado' => $this->estado
        ];
    }
}