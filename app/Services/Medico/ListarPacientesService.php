<?php

namespace App\Services\Medico;

use App\DTO\Imput\Medico\ListarPacientesInputDTO;
use App\DTO\Output\Medico\ListarPacientesOutputDTO;
use App\Exceptions\CustomException;
use App\Interfaces\IServices\Medico\IListarPacientesService;
use App\Repositories\Base\DBTransaction;
use App\Repositories\Medico\MedicoRepository;
use Exception;
use Illuminate\Http\Response;

class ListarPacientesService implements IListarPacientesService
{
    private MedicoRepository $medicoRepository;
    private DBTransaction $transaction;

    public function __construct(
        MedicoRepository $medicoRepository,
        DBTransaction $transaction
    ){
        $this->medicoRepository = $medicoRepository;
        $this->transaction = $transaction;
    }

    public function execute(ListarPacientesInputDTO $input): ListarPacientesOutputDTO
    {
        try {
            $medico = $this->medicoRepository->findById($input->id_medico);
            if(is_null($medico)){
                throw new Exception("Médico não encontrado.", Response::HTTP_NOT_FOUND);
            }
    
            $pacientes = $this->medicoRepository->obterPacientesPorMedico(
                $medico,
                $input->nome,
                $input->apenas_agendadas,
                $input->page,
                $input->perpage,
                $input->paginate
            );

            if($pacientes->isEmpty()){
                throw new Exception("Pacientes não encontrados.", Response::HTTP_NO_CONTENT);
            }
    
            return new ListarPacientesOutputDTO(
                pacientes: $pacientes
            );
        } catch (\Throwable $error) {
            $this->transaction->rollback();
            return CustomException::exception($error);
        }
    }
}