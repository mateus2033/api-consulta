<?php

namespace App\Services\Consulta;

use App\Interfaces\IServices\Consulta\IConsultarAgendaService;
use App\Repositories\Consulta\ConsultaRepository;
use Exception;
use Illuminate\Http\Response;

class ConsultarAgendaService implements IConsultarAgendaService
{
    private ConsultaRepository $consultaRepository;

    public function __construct(ConsultaRepository $consultaRepository)
    {
        $this->consultaRepository = $consultaRepository;
    }

    public function execute(int $medico_id, string $data_contulta): Exception|bool
    {
        $consulta = $this->consultaRepository->consultarAgenda($medico_id, $data_contulta);
        if($consulta) {
            throw new Exception("Médico indisponível para o horário: " . $data_contulta, Response::HTTP_BAD_REQUEST);
        }

        return true;
    }
}