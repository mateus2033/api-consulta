<?php

namespace App\Interfaces\IRepositories\Cidade;

use Illuminate\Database\Eloquent\Collection;

interface ICidadeRepository 
{
    public function list(int $page, int $perpage, bool $paginate): Collection;
}