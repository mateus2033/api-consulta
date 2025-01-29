<?php

namespace App\DTO\Output\Medico;

use App\Models\Cidade;

class AdicionarMedicosOutputDTO 
{
    public function __construct(
        public int $id,
        public string $nome,
        public string $especialidade,
        public Cidade $cidade
    ){}
}