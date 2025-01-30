<?php

namespace Tests\Builders\Cidade;

use App\Models\Cidade;

class CidadeBuilder 
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

    public function setEstado($estado = null): self
    {
        $this->attributes['estado'] = $estado;
        return $this;
    }

    public function create($quantity = null)
    {
        return Cidade::factory($quantity)->create($this->attributes);
    }

    public function make($quantity = null)
    {
        return Cidade::factory($quantity)->make($this->attributes);
    }
}