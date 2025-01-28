<?php

namespace App\Services\Cidade;

use App\Exceptions\CustomException;
use App\DTO\Imput\Cidade\ListarCidadesInputDTO;
use App\DTO\Output\Cidade\ListarCidadesOutputDTO;
use App\Interfaces\IServices\Cidade\IListarCidadesService;
use App\Repositories\Cidade\CidadeRepository;

class ListarCidadesService implements IListarCidadesService
{
    private CidadeRepository $cidadeRepository;

    public function __construct(CidadeRepository $cidadeRepository)
    {
        $this->cidadeRepository = $cidadeRepository;
    }

    public function execute(ListarCidadesInputDTO $input): ListarCidadesOutputDTO
    {
        try {
            $cidades = $this->cidadeRepository->listarCidades(
                $input->nome,
                $input->page,
                $input->perpage,
                $input->paginate
            ); 
    
            return new ListarCidadesOutputDTO(
                cidades: $cidades
            );
        } catch (\Throwable $error) {
            return CustomException::exception($error);
        }
    }
}