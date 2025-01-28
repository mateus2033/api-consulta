<?php

namespace App\Repositories\Medico;

use App\Interfaces\IRepositories\Medico\IMedicoRepository;
use App\Models\Medico;
use App\Repositories\Base\BaseRepository;

class MedicoRepository extends BaseRepository implements IMedicoRepository
{
    protected $modelClass = Medico::class;

    public function listarMedicos(?string $nome, ?int $page, ?int $perpage, ?bool $paginate)
    {  
        $query = $this->getModel()->newQuery()
            ->orderBy('nome')
            ->select('id','nome','especialidade')
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