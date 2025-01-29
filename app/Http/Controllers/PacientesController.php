<?php

namespace App\Http\Controllers;

use App\DTO\Imput\Paciente\AdicionarPacienteInputDTO;
use App\Http\Requests\Paciente\AdicionarPacienteFormRequest;
use App\Http\Resources\Paciente\AdicionarPacienteResource;
use App\Services\Paciente\AdicionarPacienteService;
use Illuminate\Http\Response;

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
}