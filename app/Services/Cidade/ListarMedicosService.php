<?php

namespace App\Services\Cidade;

use App\DTO\Imput\Cidade\ListarMedicosInputDTO;
use App\DTO\Output\Cidade\ListarMedicosOutputDTO;
use App\Exceptions\CustomException;
use App\Interfaces\IServices\Cidade\IListarMedicosService;
use App\Repositories\Base\DBTransaction;
use App\Repositories\Cidade\CidadeRepository;
use Exception;
use Illuminate\Http\Response;

class ListarMedicosService implements IListarMedicosService
{
    private CidadeRepository $cidadeRepository;
    private DBTransaction $transaction;

    public function __construct(
        CidadeRepository $cidadeRepository,
        DBTransaction $transaction
    ){
        $this->cidadeRepository = $cidadeRepository;
        $this->transaction = $transaction;
    }

    public function execute(ListarMedicosInputDTO $input): ListarMedicosOutputDTO
    {
        try {
            $cidade = $this->cidadeRepository->findById($input->id_cidade);
            if(is_null($cidade)) {
                throw new Exception("Cidade não encontrada.", Response::HTTP_NOT_FOUND);
            }

            $medicosByCidade = $this->cidadeRepository->getMedicosByCidade(
                $cidade,
                $input->nome,
                $input->page,
                $input->perpage,
                $input->paginate
            );

            if($medicosByCidade->isEmpty()) {
                throw new Exception("Medicos não encontrados.", Response::HTTP_NO_CONTENT);
            }

            return new ListarMedicosOutputDTO(
                medicos: $medicosByCidade 
            );
        } catch (\Throwable $error) {
            $this->transaction->rollback();
            return CustomException::exception($error);
        }
    }
}