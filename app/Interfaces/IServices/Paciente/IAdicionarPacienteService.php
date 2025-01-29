<?php

namespace App\Interfaces\IServices\Paciente;

use App\DTO\Imput\Paciente\AdicionarPacienteInputDTO;
use App\DTO\Output\Paciente\AdicionarPacienteOutputDTO;

interface IAdicionarPacienteService 
{
    public function execute(AdicionarPacienteInputDTO $input): AdicionarPacienteOutputDTO;
}