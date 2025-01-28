<?php

namespace App\Repositories\Cidade;

use App\Models\Cidade;
use App\Repositories\Base\BaseRepository;
use App\Interfaces\IRepositories\Cidade\ICidadeRepository;

class CidadeRepository extends BaseRepository implements ICidadeRepository
{
    protected $modelClass = Cidade::class;

    public function listarCidades(?string $nome, ?int $page, ?int $perpage, ?bool $paginate)
    {  
        $query = $this->getModel()->newQuery()
            ->orderBy('nome')
            ->select('id','nome','estado')
            ->when($nome, function ($query) use ($nome) {
                return $query->where('nome', 'like', '%' . $nome . '%');
            });

        return $this->mountQuery(
            $query, 
            $perpage, 
            $columns = ['*'], 
            $pageName = null, 
            $page, 
            $paginate
        ); 
    }
}