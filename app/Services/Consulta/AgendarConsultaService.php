<?php

namespace App\Services\Consulta;

use App\DTO\Imput\Consulta\AgendarConsultaInputDTO;
use App\DTO\Output\Consulta\AgendarConsultaOutputDTO;
use App\Exceptions\CustomException;
use App\Interfaces\IServices\Consulta\IAgendarConsultaService;
use App\Repositories\Base\DBTransaction;
use App\Repositories\Consulta\ConsultaRepository;

class AgendarConsultaService implements IAgendarConsultaService
{
    private ConsultaRepository $consultaRepository;
    private DBTransaction $transaction;
    private ConsultarAgendaService $consultarAgendaService;

    public function __construct(
        ConsultaRepository $consultaRepository,
        DBTransaction $transaction,
        ConsultarAgendaService $consultarAgendaService
    ){
        $this->consultaRepository = $consultaRepository;
        $this->transaction = $transaction;
        $this->consultarAgendaService = $consultarAgendaService;
    }

    public function execute(AgendarConsultaInputDTO $input): AgendarConsultaOutputDTO
    {
        try {
            $this->consultarAgendaService->execute(
                $input->medico_id,
                $input->data_contula
            );

            $consulta = $this->consultaRepository->create([
                'medico_id' => $input->medico_id,
                'paciente_id' => $input->paciente_id,
                'data' => $input->data_contula
            ]);

            $this->transaction->commit();
            return new AgendarConsultaOutputDTO(
                consulta: $consulta
            );
        } catch (\Throwable $error) {
           $this->transaction->rollback();
           return CustomException::exception($error);
        }
    }
}