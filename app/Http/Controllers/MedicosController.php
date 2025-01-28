<?php

namespace App\Http\Controllers;

use App\DTO\Imput\Paciente\{
    ListarMedicosInputDTO
};

use App\Http\Requests\Medico\{
    ListarMedicosFormRequest
};
use App\Http\Resources\Medico\{
    ListarMedicosRerouce
};

use App\Services\Medico\{
    ListarMedicosServico
};
use Illuminate\Http\Response;

class MedicosController extends Controller
{
    public function listarCidades(ListarMedicosFormRequest $medicoRequest, ListarMedicosServico $listarMedicosServico)
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
}