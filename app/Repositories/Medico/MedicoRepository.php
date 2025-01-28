<?php

namespace App\Repositories\Medico;

use App\Interfaces\IRepositories\Medico\IMedicoRepository;
use App\Models\Medico;
use App\Repositories\Base\BaseRepository;

class MedicoRepository extends BaseRepository implements IMedicoRepository
{
    protected $modelClass = Medico::class;
}