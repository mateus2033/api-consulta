<?php

namespace App\Http\Resources\Consulta;

use Illuminate\Http\Resources\Json\JsonResource;

class ListarConsultaResource extends JsonResource
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
            $this->consultas
        ];
    } 
}