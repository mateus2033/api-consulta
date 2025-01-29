<?php

namespace App\DTO\Imput\Medico;

class ListarPacientesInputDTO 
{
    public function __construct(
        public ?string $nome,
        public ?bool $apenas_agendadas,
        public ?int $id_medico,
        public ?int $page,
        public ?int $perpage,
        public ?bool $paginate
    ){}
}