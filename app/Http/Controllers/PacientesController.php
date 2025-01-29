<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;

use App\DTO\Imput\Paciente\{
    AtualizarPacienteInputDTO,
    AdicionarPacienteInputDTO
};

use App\Http\Requests\Paciente\{
    AdicionarPacienteFormRequest,
    AtualizarPacienteFormRequest
};

use App\Services\Paciente\{
    AtualizarPacienteService,
    AdicionarPacienteService
};
use App\Http\Resources\Paciente\{
    AdicionarPacienteResource,
    AtualizarPacienteResource
};

class PacientesController extends Controller 
{
    public function adicionarPaciente(AdicionarPacienteFormRequest $pacienteRequest, AdicionarPacienteService $adicionarService)
    {
        $response = $adicionarService->execute(
            input: new AdicionarPacienteInputDTO(
                nome: $pacienteRequest->nome,
                cpf: $pacienteRequest->cpf,
                celular: $pacienteRequest->celular
            )
        );
        
        return (new AdicionarPacienteResource($response->paciente))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function atualizarPaciente(AtualizarPacienteFormRequest $pacienteRequest, $id_paciente, AtualizarPacienteService $atualizarService)
    {
        $response = $atualizarService->execute(
            input: new AtualizarPacienteInputDTO(
                id_paciente: (int) $id_paciente,
                nome: $pacienteRequest->nome,
                celular: $pacienteRequest->celular
            )
        );

        return (new AtualizarPacienteResource($response->paciente))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }
}