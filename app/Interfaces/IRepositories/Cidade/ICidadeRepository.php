<?php

namespace App\Interfaces\IRepositories\Cidade;

use Illuminate\Database\Eloquent\Collection;

interface ICidadeRepository 
{
    public function list(int $page, int $perpage, bool $paginate, array $columns = ['*'], array $relationships = []);
    public function listarCidades(?string $name, ?int $page, ?int $perpage, ?bool $paginate);
}