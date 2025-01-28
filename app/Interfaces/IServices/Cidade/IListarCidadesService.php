<?php

namespace App\Interfaces\IServices\Cidade;

use App\DTO\Imput\Cidade\ListarCidadesInputDTO;
use App\DTO\Output\Cidade\ListarCidadesOutputDTO;

interface IListarCidadesService 
{
    public function execute(ListarCidadesInputDTO $input): ListarCidadesOutputDTO;
}