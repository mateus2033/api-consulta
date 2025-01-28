<?php

namespace App\Services\Medico;

use App\DTO\Imput\Medico\AdicionarMedicosInputDTO;
use App\DTO\Output\Medico\AdicionarMedicosOutputDTO;
use App\Exceptions\CustomException;
use App\Repositories\Base\DBTransaction;
use App\Repositories\Medico\MedicoRepository;
use App\Interfaces\IServices\Medico\IAdicionarMedicosService;

class AdicionarMedicosService implements IAdicionarMedicosService
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

    public function execute(AdicionarMedicosInputDTO $input): AdicionarMedicosOutputDTO
    {
        try {
            $medico = $this->medicoRepository->create([
                'nome' => $input->nome,
                'especialidade' => $input->especialidade,
                'cidade_id' => $input->cidade_id,
            ]);
    
            $this->transaction->commit();
            return new AdicionarMedicosOutputDTO(
                id: $medico->id,
                nome: $medico->nome,
                especialidade: $medico->especialidade,
                cidade: $medico->cidade
            );
        } catch (\Throwable $error) {
            $this->transaction->rollback();
            return CustomException::exception($error);
        }
    }
}