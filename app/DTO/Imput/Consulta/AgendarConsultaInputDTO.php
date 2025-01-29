<?php

namespace App\DTO\Imput\Consulta;

use Illuminate\Support\Facades\Date;

class AgendarConsultaInputDTO 
{
    public function __construct(
        public int $medico_id,
        public int $paciente_id,
        public string $data_contula
    ){}
}