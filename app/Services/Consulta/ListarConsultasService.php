<?php

namespace App\Services\Consulta;

use App\DTO\Imput\Consulta\ListarConsultaInputDTO;
use App\DTO\Output\Consulta\ListarConsultaOutputDTO;
use App\Exceptions\CustomException;
use App\Interfaces\IServices\Consulta\IListarConsultasService;
use App\Repositories\Consulta\ConsultaRepository;
use Illuminate\Http\Response;
use Exception;

class ListarConsultasService implements IListarConsultasService
{
    private ConsultaRepository $consultaRepository;

    public function __construct(
        ConsultaRepository $consultaRepository,
    ){
        $this->consultaRepository = $consultaRepository;
    }

    public function execute(ListarConsultaInputDTO $input): ListarConsultaOutputDTO
    {
        try {
            $consultas = $this->consultaRepository->findConsultaWithRelationships(
                $input->id_paciente,
                $input->page, 
                $input->perpage, 
                $input->paginate 
            );
    
            if($consultas->isEmpty()){
                throw new Exception("Paciente sem registro de consultas.", Response::HTTP_NOT_FOUND);
            }
    
            return new ListarConsultaOutputDTO(
                consultas: $consultas
            );
        } catch (\Throwable $error) {
           CustomException::exception($error);
        }
    }
}