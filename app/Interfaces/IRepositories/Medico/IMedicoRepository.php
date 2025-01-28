<?php

namespace App\Interfaces\IRepositories\Medico;

use App\Models\Medico;
use Illuminate\Database\Eloquent\Collection;

interface IMedicoRepository 
{
    public function list(int $page, int $perpage, bool $paginate): Collection;
    public function create(array $data): Medico;
}