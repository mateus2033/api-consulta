<?php

namespace App\Repositories\Paciente;

use App\Interfaces\IRepositories\Paciente\IPacienteRepository;
use App\Models\Paciente;
use App\Repositories\Base\BaseRepository;

class PacienteRepository extends BaseRepository implements IPacienteRepository
{
    protected $modelClass = Paciente::class;

    public function findByCpf(string $cpf)
    {
        return $query = $this
            ->getModel()
            ->newQuery()
            ->where('cpf', $cpf)
            ->get()
            ->first();
    }
}