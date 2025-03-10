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
            'medico_id' => $this->medico_id,
            'paciente_id' => $this->paciente_id,
            'updated_at' => $this->updated_at,
            'created_at' => $this->created_at,
            'deleted_at' => $this->deleted_at
        ];
    } 
}