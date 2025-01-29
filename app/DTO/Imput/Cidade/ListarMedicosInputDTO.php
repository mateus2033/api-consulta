<?php

namespace App\DTO\Imput\Cidade;

class ListarMedicosInputDTO 
{
    public function __construct(
        public ?string $nome,
        public ?int $id_cidade,
        public ?int $page,
        public ?int $perpage,
        public ?bool $paginate
    ){}
}