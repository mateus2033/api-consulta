<?php

namespace App\Interfaces\IRepositories\Medico;

interface IMedicoRepository 
{
    public function list(int $page, int $perpage, bool $paginate, array $columns = ['*'], array $relationships = []);
    public function listarMedicos(?string $name, ?int $page, ?int $perpage, ?bool $paginate);
    public function create(array $data);
}