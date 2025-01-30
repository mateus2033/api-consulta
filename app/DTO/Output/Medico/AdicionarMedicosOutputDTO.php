<?php

namespace App\DTO\Output\Medico;

use App\Models\Medico;

class AdicionarMedicosOutputDTO 
{
    public function __construct(
        public Medico $medico
    ){}
}