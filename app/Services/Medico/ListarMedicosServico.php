<?php

namespace App\Services\Medico;

use App\DTO\Imput\Paciente\ListarMedicosInputDTO;
use App\DTO\Output\Medico\ListarMedicosOutputDTO;
use App\Exceptions\CustomException;
use App\Interfaces\IServices\Medico\IListarMedicosServico;
use App\Repositories\Medico\MedicoRepository;
use Exception;
use Illuminate\Http\Response;

class ListarMedicosServico implements IListarMedicosServico
{
    private MedicoRepository $medicoRepository;

    public function __construct(MedicoRepository $medicoRepository)
    {
        $this->medicoRepository = $medicoRepository;
    }

    public function execute(ListarMedicosInputDTO $input): ListarMedicosOutputDTO
    {   
        try {
            $medicos = $this->medicoRepository->listarMedicos(
                $input->nome,
                $input->page,
                $input->perpage,
                $input->paginate
            ); 
    
            if($medicos->isEmpty()) {
                throw new Exception("Medico não encontrado.", Response::HTTP_NO_CONTENT);
            }

            return new ListarMedicosOutputDTO(
                medicos: $medicos
            );
        } catch (\Throwable $error) {
            return CustomException::exception($error);
        }
    }
}