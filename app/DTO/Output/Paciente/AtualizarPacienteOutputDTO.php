<?php

namespace App\DTO\Output\Paciente;

use App\Models\Paciente;

class AtualizarPacienteOutputDTO 
{
    public function __construct(
        public Paciente $paciente
    ){}
}