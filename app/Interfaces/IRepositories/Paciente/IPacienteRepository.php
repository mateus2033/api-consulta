<?php

namespace App\Interfaces\IRepositories\Paciente;

use App\Models\Paciente;
use Illuminate\Database\Eloquent\Collection;

interface IPacienteRepository
{
    public function list(int $page, int $perpage, bool $paginate): Collection;
    public function create(array $data): Paciente;
    public function update(Paciente $paciente, array $inputData): bool;
}