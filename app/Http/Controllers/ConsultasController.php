<?php

namespace App\Http\Controllers;

use App\DTO\Imput\Consulta\AgendarConsultaInputDTO;
use App\DTO\Imput\Consulta\ListarConsultaInputDTO;
use App\Http\Requests\Consulta\AgendarContultaFormRequest;
use App\Http\Requests\Consulta\ListarConsultasFormRequest;
use App\Http\Resources\Consulta\AgendarConsultaResource;
use App\Http\Resources\Consulta\ListarConsultaResource;
use App\Services\Consulta\AgendarConsultaService;
use App\Services\Consulta\ListarConsultasService;
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

    public function listarConsultas(ListarConsultasFormRequest $consultaRequest, $id_paciente, ListarConsultasService $consultaService)
    {
        $response = $consultaService->execute(
            input: new ListarConsultaInputDTO(
                id_paciente: (int) $id_paciente,
                page: $consultaRequest->page,
                perpage: $consultaRequest->perpage,
                paginate: $consultaRequest->paginate,
            )
        );

        return (new ListarConsultaResource($response))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }
}