<?php

namespace App\Interfaces\IRepositories\Paciente;

use App\Models\Paciente;
use Illuminate\Database\Eloquent\Collection;

interface IPacienteRepository
{
    public function list(int $page, int $perpage, bool $paginate, array $columns = ['*'], array $relationships = []);
    public function create(array $data);
    public function update(Paciente $paciente, array $inputData);
}