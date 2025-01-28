<?php

namespace App\Http\Controllers;

use App\DTO\Imput\Cidade\ListarCidadesInputDTO;
use App\Http\Requests\Cidade\ListarCidadesFormRequest;
use App\Http\Resources\Cidade\ListarCidadesRerouce;
use App\Services\Cidade\ListarCidadesService;
use Illuminate\Http\Response;

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

        return (new ListarCidadesRerouce($response))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }
}