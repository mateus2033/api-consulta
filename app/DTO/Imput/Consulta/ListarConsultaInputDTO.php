<?php

namespace App\DTO\Imput\Consulta;

class ListarConsultaInputDTO 
{
    public function __construct(
        public ?int $id_paciente,
        public ?int $page,
        public ?int $perpage,
        public ?bool $paginate
    ){}
}