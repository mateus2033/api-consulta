<?php

namespace App\Interfaces\IServices\Medico;

use App\DTO\Imput\Medico\ListarPacientesInputDTO;
use App\DTO\Output\Medico\ListarPacientesOutputDTO;

interface IListarPacientesService 
{
    public function execute(ListarPacientesInputDTO $input): ListarPacientesOutputDTO;
}