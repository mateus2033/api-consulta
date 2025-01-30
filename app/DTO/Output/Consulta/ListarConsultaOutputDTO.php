<?php

namespace App\DTO\Output\Consulta;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class ListarConsultaOutputDTO 
{
    public function __construct(
        public Collection | LengthAwarePaginator $consultas
    ){}
}