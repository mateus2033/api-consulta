<?php

namespace Tests\Builders\Consulta;

use App\Models\Consulta;

class ConsultaBuilder 
{
    protected $attributes = [];

    public function setId($id = null): self
    {
        $this->attributes['id'] = $id;
        return $this;
    }

    public function setMedicoId($medico_id = null): self
    {
        $this->attributes['medico_id'] = $medico_id;
        return $this;
    }

    public function setPacienteId($paciente_id = null): self
    {
        $this->attributes['paciente_id'] = $paciente_id;
        return $this;
    }

    public function setData($data = null): self
    {
        $this->attributes['data'] = $data;
        return $this;
    }

    public function create($quantity = null)
    {
        return Consulta::factory($quantity)->create($this->attributes);
    }

    public function make($quantity = null)
    {
        return Consulta::factory($quantity)->make($this->attributes);
    }
}