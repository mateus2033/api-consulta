<?php

namespace App\Repositories\Consulta;

use App\Models\Consulta;
use App\Interfaces\IRepositories\Consulta\IConsultaRepository;
use App\Repositories\Base\BaseRepository;

class ConsultaRepository extends BaseRepository implements IConsultaRepository
{
    protected $modelClass = Consulta::class;
}