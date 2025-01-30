<?php

namespace Tests\Builders\Medico;

use App\Models\Medico;

class MedicoBuilder 
{
    protected $attributes = [];

    public function setId($id = null): self
    {
        $this->attributes['id'] = $id;
        return $this;
    }

    public function setNome($nome = null): self
    {
        $this->attributes['nome'] = $nome;
        return $this;
    }

    public function setEspecialidade($especialidade = null): self
    {
        $this->attributes['especialidade'] = $especialidade;
        return $this;
    }

    public function setCidadeId($cidade_id = null): self
    {
        $this->attributes['cidade_id'] = $cidade_id;
        return $this;
    }

    public function create($quantity = null)
    {
        return Medico::factory($quantity)->create($this->attributes);
    }

    public function make($quantity = null)
    {
        return Medico::factory($quantity)->make($this->attributes);
    }
}