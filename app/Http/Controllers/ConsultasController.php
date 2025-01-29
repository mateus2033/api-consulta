<?php

namespace App\Http\Controllers;

use App\DTO\Imput\Consulta\AgendarConsultaInputDTO;
use App\Http\Requests\Consulta\AgendarContultaFormRequest;
use App\Http\Resources\Consulta\AgendarConsultaResource;
use App\Services\Consulta\AgendarConsultaService;
use Illuminate\Http\Response;

class ConsultasController extends Controller
{
    public function agendarConsulta(AgendarContultaFormRequest $agendaRequest, AgendarConsultaService $agendaService)
    {
        $response = $agendaService->execute(
            input: new AgendarConsultaInputDTO(
                medico_id: $agendaRequest->medico_id,
                paciente_id: $agendaRequest->paciente_id,
                data_contula: $agendaRequest->data_contula
            )
        );
      
        return (new AgendarConsultaResource($response->consulta))
           ->response()
           ->setStatusCode(Response::HTTP_CREATED);
    }
}