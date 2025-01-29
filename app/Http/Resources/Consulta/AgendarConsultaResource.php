<?php

namespace App\Http\Resources\Consulta;

use Illuminate\Http\Resources\Json\JsonResource;

class AgendarConsultaResource extends JsonResource
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
            'data' => $this->data,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
            'medico_id' => $this->medico,
            'paciente_id' => $this->paciente
        ];
    } 
}