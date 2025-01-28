<?php

namespace App\DTO\Imput\Medico;

class AdicionarMedicosInputDTO 
{
    public function __construct(
        public string $nome,
        public string $especialidade,
        public int $cidade_id
    ){}
}