<?php

namespace App\Interfaces\IServices\Consulta;

use App\DTO\Imput\Consulta\ListarConsultaInputDTO;
use App\DTO\Output\Consulta\ListarConsultaOutputDTO;

interface IListarConsultasService
{
    public function execute(ListarConsultaInputDTO $input): ListarConsultaOutputDTO;
}