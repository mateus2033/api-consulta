<?php

namespace App\Repositories\Medico;

use Carbon\Carbon;
use App\Models\Medico;
use App\Interfaces\IRepositories\Medico\IMedicoRepository;
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

    public function obterPacientesPorMedico(Medico $medico , ?string $nome, ?bool $apenas_agendadas, ?int $page, ?int $perpage, ?bool $paginate)
    {   
        $query = $medico
            ->pacientes() 
            ->orderBy('data')  
                ->when($nome, function ($query) use ($nome) {
                    return $query->where('nome', 'like', '%' . $nome . '%');
                })   
                ->when($apenas_agendadas == true, function ($query) {
                    return $query->where('data' ,'>=' ,Carbon::now());
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