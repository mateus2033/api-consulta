<?php

namespace App\DTO\Output\Paciente;

use App\Models\Paciente;

class AdicionarPacienteOutputDTO 
{
    public function __construct(
        public Paciente $paciente
    ){}
}