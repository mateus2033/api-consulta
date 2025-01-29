<?php

namespace App\Services\Paciente;

use App\DTO\Imput\Paciente\AdicionarPacienteInputDTO;
use App\DTO\Output\Paciente\AdicionarPacienteOutputDTO;
use App\Exceptions\CustomException;
use App\Interfaces\IServices\Paciente\IAdicionarPacienteService;
use App\Repositories\Base\DBTransaction;
use App\Repositories\Paciente\PacienteRepository;
use App\Utils\Celular;
use App\Utils\CPF;
use Exception;
use Illuminate\Http\Response;

class AdicionarPacienteService implements IAdicionarPacienteService
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

    public function execute(AdicionarPacienteInputDTO $input): AdicionarPacienteOutputDTO
    {
        try {
            $cpf = CPF::execute($input->cpf);
            $celular = Celular::execute($input->celular);

            $paciente = $this->pacienteRepository->findByCpf($cpf);
            if(!is_null($paciente)){
                throw new Exception("Cpf já cadastrado.", Response::HTTP_CONFLICT);
            }
           
            $paciente = $this->pacienteRepository->create([
                'nome' => $input->nome,
                'cpf' => $cpf,
                'celular' => $celular
            ]);

            $this->transaction->commit();
            return new AdicionarPacienteOutputDTO(
                paciente: $paciente
            );
        } catch (\Throwable $error) {
            $this->transaction->rollback();
            return CustomException::exception($error);
        }
    }
}