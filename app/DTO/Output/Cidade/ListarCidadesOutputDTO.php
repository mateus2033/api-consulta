<?php

namespace App\DTO\Output\Cidade;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class ListarCidadesOutputDTO 
{
    public function __construct(
        public Collection | LengthAwarePaginator $cidades,
    ){}
}