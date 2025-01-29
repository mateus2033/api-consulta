<?php

namespace App\Interfaces\IServices\Cidade;

use App\DTO\Imput\Cidade\ListarMedicosInputDTO;
use App\DTO\Output\Cidade\ListarMedicosOutputDTO;

interface IListarMedicosService 
{
    public function execute(ListarMedicosInputDTO $input): ListarMedicosOutputDTO;
}
