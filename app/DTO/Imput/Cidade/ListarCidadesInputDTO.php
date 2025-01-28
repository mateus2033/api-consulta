<?php

namespace App\DTO\Imput\Cidade;

class ListarCidadesInputDTO 
{
    public function __construct(
        public ?string $nome,
        public ?int $page,
        public ?int $perpage,
        public ?bool $paginate
    ){}
}