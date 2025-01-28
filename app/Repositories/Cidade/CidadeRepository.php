<?php

namespace App\Repositories\Cidade;

use App\Models\Cidade;
use App\Repositories\Base\BaseRepository;
use App\Interfaces\IRepositories\Cidade\ICidadeRepository;

class CidadeRepository extends BaseRepository implements ICidadeRepository
{
    protected $modelClass = Cidade::class;
}