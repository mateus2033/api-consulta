<?php

namespace App\Interfaces\IServices\Consulta;

use App\DTO\Imput\Consulta\AgendarConsultaInputDTO;
use App\DTO\Output\Consulta\AgendarConsultaOutputDTO;

interface IAgendarConsultaService 
{
    public function execute(AgendarConsultaInputDTO $input): AgendarConsultaOutputDTO;
}