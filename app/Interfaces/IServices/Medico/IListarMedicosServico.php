<?php

namespace App\Interfaces\IServices\Medico;

use App\DTO\Imput\Paciente\ListarMedicosInputDTO;
use App\DTO\Output\Medico\ListarMedicosOutputDTO;

interface IListarMedicosServico 
{
    public function execute(ListarMedicosInputDTO $input): ListarMedicosOutputDTO;
}