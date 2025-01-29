<?php

namespace App\Services\Paciente;

use App\DTO\Imput\Paciente\AtualizarPacienteInputDTO;
use App\DTO\Output\Paciente\AtualizarPacienteOutputDTO;
use App\Exceptions\CustomException;
use App\Interfaces\IServices\Paciente\IAtualizarPacienteService;
use App\Repositories\Base\DBTransaction;
use App\Repositories\Paciente\PacienteRepository;
use App\Utils\Celular;
use Exception;
use Illuminate\Http\Response;

class AtualizarPacienteService implements IAtualizarPacienteService
{
    private PacienteRepository $pacienteRepository;
    private DBTransaction $transaction;

    public function __construct(
        PacienteRepository $pacienteRepository,
        DBTransaction $transaction
    ){
        $this->pacienteRepository = $pacienteRepository;
        $this->transaction = $transaction;
    }
    
    public function execute(AtualizarPacienteInputDTO $input): AtualizarPacienteOutputDTO
    {
        try {
            $celular = Celular::execute($input->celular);
            $paciente = $this->pacienteRepository->findById($input->id_paciente);
            if(is_null($paciente)){
                throw new Exception("Paciente não encontrado.", Response::HTTP_NOT_FOUND);
            }
            
            $this->pacienteRepository->update($paciente,[
                'nome' => $input->nome,
                'celular' => $celular
            ]);
            
            $this->transaction->commit();
            return new AtualizarPacienteOutputDTO(
                paciente: $paciente->refresh()
            );
        } catch (\Throwable $error) {
            $this->transaction->rollback();
            return CustomException::exception($error);
        }
    }
}