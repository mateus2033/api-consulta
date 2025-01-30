<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

use App\DTO\Imput\Cidade\{
    ListarMedicosInputDTO,
    ListarCidadesInputDTO
};

use App\Http\Resources\Cidade\{
    ListarMedicosServiceResource,
    ListarCidadesRerouce
};

use App\Http\Requests\Cidade\{
    ListarMedicosFormRequest,
    ListarCidadesFormRequest
};

use App\Services\Cidade\{
    ListarMedicosService,
    ListarCidadesService
};

class CidadesController extends Controller
{
    public function listarCidades(ListarCidadesFormRequest $cidadeRequest, ListarCidadesService $listarCidadesService)
    {
        $response = $listarCidadesService->execute(
            input: new ListarCidadesInputDTO(
                nome: $cidadeRequest->nome,
                page: $cidadeRequest->page,
                perpage: $cidadeRequest->perpage,
                paginate: $cidadeRequest->paginate,
            )
        );

        return ListarCidadesRerouce::collection($response->cidades)
            ->response()
            ->setStatusCode(Response::HTTP_OK);  
    }

    public function listarMedicos(ListarMedicosFormRequest $medicosRequest, ?string $id_cidade, ListarMedicosService $listarMedicosService)
    {
        $response = $listarMedicosService->execute(
            input: new ListarMedicosInputDTO(
                nome: $medicosRequest->nome,
                id_cidade: (int) $id_cidade,
                page: $medicosRequest->page,
                perpage: $medicosRequest->perpage,
                paginate: $medicosRequest->paginate
            )
        );

        return ListarMedicosServiceResource::collection($response->medicos)
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }
}