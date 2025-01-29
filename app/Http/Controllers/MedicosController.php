<?php

namespace App\Http\Controllers;

use App\DTO\Imput\Medico\{
    AdicionarMedicosInputDTO,
    ListarMedicosInputDTO,
    ListarPacientesInputDTO
};
    
use App\Http\Requests\Medico\{
    AdicionarMedicoFormRequest,
    ListarMedicosFormRequest,
    ListarPacientesFormRequest
};
use App\Http\Resources\Medico\{
    AdicionarMedicoResource,
    ListarMedicosRerouce,
    ListarPacientesResource
};

use App\Services\Medico\{
    AdicionarMedicosService,
    ListarMedicosServico,
    ListarPacientesService
};
use Illuminate\Http\Response;

class MedicosController extends Controller
{
    public function listarMedicos(ListarMedicosFormRequest $medicoRequest, ListarMedicosServico $listarMedicosServico)
    {
        $response = $listarMedicosServico->execute(
            input: new ListarMedicosInputDTO(
                nome: $medicoRequest->nome,
                page: $medicoRequest->page,
                perpage: $medicoRequest->perpage,
                paginate: $medicoRequest->paginate,
            )
        );

        return (new ListarMedicosRerouce($response))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }

    public function adicioarMedico(AdicionarMedicoFormRequest $medicoRequest, AdicionarMedicosService $adicionarMedicosServico)
    {
        $response = $adicionarMedicosServico->execute(
            input: new AdicionarMedicosInputDTO(
                nome: $medicoRequest->nome,
                especialidade: $medicoRequest->especialidade,
                cidade_id: $medicoRequest->cidade_id
            )
        );

        return (new AdicionarMedicoResource($response))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function listarPacientes(ListarPacientesFormRequest $pacienteRequest, $id_medico, ListarPacientesService $pacienteService)
    {
        $response = $pacienteService->execute(
            input: new ListarPacientesInputDTO(
                nome: $pacienteRequest->nome,
                apenas_agendadas: $pacienteRequest->apenas_agendadas,
                id_medico: (int) $id_medico,
                page: $pacienteRequest->page,
                perpage: $pacienteRequest->perpage,
                paginate: $pacienteRequest->paginate
            )
        );

        return (new ListarPacientesResource($response))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }
}