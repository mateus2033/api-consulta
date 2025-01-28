<?php

namespace App\Interfaces\IRepositories\Consulta;

use App\Models\Consulta;
use Illuminate\Database\Eloquent\Collection;

interface IConsultaRepository 
{
    public function list(int $page, int $perpage, bool $paginate): Collection;
    public function create(array $data): Consulta;
}