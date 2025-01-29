<?php

namespace App\Interfaces\IServices\Medico;

use App\DTO\Imput\Medico\AdicionarMedicosInputDTO;
use App\DTO\Output\Medico\AdicionarMedicosOutputDTO;

interface IAdicionarMedicosService 
{
    public function execute(AdicionarMedicosInputDTO $input): AdicionarMedicosOutputDTO;
}