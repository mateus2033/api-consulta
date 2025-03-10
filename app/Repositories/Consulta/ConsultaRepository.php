<?php

namespace App\Repositories\Consulta;

use App\Models\Consulta;
use App\Interfaces\IRepositories\Consulta\IConsultaRepository;
use App\Repositories\Base\BaseRepository;

class ConsultaRepository extends BaseRepository implements IConsultaRepository
{
    protected $modelClass = Consulta::class;

    public function consultarAgenda(int $medico_id, string $data_contulta)
    {
        return $this
            ->getModel()
            ->newQuery()
            ->where('medico_id', $medico_id)
            ->where('data', $data_contulta)
            ->get()
            ->first();
    }

    public function findConsultaWithRelationships(?int $id_paciente, ?int $page, ?int $perpage, ?bool $paginate)
    {
        $query = $this
            ->getModel()
            ->newQuery()
            ->with(['medico','paciente'])
            ->where('paciente_id', $id_paciente);

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