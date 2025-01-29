<?php

namespace App\DTO\Output\Medico;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class ListarPacientesOutputDTO 
{
    public function __construct(
        public Collection | LengthAwarePaginator $pacientes,
    ){} 
}