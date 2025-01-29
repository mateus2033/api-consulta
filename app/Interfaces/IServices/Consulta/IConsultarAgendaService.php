<?php

namespace App\Interfaces\IServices\Consulta;

use Exception;

interface IConsultarAgendaService 
{
    public function execute(int $medico_id, string $data_contulta): Exception | bool;
}