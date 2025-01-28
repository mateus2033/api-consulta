<?php

namespace App\DTO\Imput\Medico;

class ListarMedicosInputDTO 
{
    public function __construct(
        public ?string $nome,
        public ?int $page,
        public ?int $perpage,
        public ?bool $paginate
    ){}
}