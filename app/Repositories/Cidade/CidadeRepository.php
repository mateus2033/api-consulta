<?php

namespace App\Repositories\Cidade;

use App\Models\Cidade;
use App\Repositories\Base\BaseRepository;
use App\Interfaces\IRepositories\Cidade\ICidadeRepository;
use Illuminate\Support\Facades\DB;

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

    public function getMedicosByCidade(Cidade $cidade, ?string $nome, ?int $page, ?int $perpage, ?bool $paginate)
    {
        $query = $cidade
            ->medicos()
            ->join('cidades', 'medicos.cidade_id', 'cidades.id') 
            ->orderBy('nome')
            ->select('medicos.id', 'medicos.nome', 'medicos.especialidade', 'medicos.cidade_id')
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