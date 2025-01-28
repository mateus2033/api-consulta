<?php

namespace App\Http\Controllers;

use App\DTO\Imput\Medico\{
    AdicionarMedicosInputDTO,
    ListarMedicosInputDTO
};
    
use App\Http\Requests\Medico\{
    AdicionarMedicoFormRequest,
    ListarMedicosFormRequest
};
use App\Http\Resources\Medico\{
    AdicionarMedicoResource,
    ListarMedicosRerouce
};

use App\Services\Medico\{
    AdicionarMedicosService,
    ListarMedicosServico
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
}