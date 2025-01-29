<?php

namespace App\Interfaces\IServices\Paciente;

use App\DTO\Imput\Paciente\AtualizarPacienteInputDTO;
use App\DTO\Output\Paciente\AtualizarPacienteOutputDTO;

interface IAtualizarPacienteService 
{
    public function execute(AtualizarPacienteInputDTO $input): AtualizarPacienteOutputDTO;
}