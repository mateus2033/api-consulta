<?php

namespace App\DTO\Imput\Paciente;

class ListarMedicosInputDTO 
{
    public function __construct(
        public ?string $nome,
        public ?int $page,
        public ?int $perpage,
        public ?bool $paginate
    ){}
}