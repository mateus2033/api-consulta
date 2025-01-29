<?php

namespace App\DTO\Output\Consulta;

use App\Models\Consulta;

class AgendarConsultaOutputDTO 
{
    public function __construct(
        public Consulta $consulta,
    ){}
}