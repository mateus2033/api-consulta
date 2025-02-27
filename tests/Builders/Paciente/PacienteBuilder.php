<?php

namespace Tests\Builders\Paciente;

use App\Models\Paciente;

class PacienteBuilder 
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

    public function setCpf($cpf = null): self
    {
        $this->attributes['cpf'] = $cpf;
        return $this;
    }

    public function setCelular($celular = null): self
    {
        $this->attributes['celular'] = $celular;
        return $this;
    }

    public function setUserId($user_id = null): self
    {
        $this->attributes['user_id'] = $user_id;
        return $this;
    }

    public function create($quantity = null)
    {
        return Paciente::factory($quantity)->create($this->attributes);
    }

    public function make($quantity = null)
    {
        return Paciente::factory($quantity)->make($this->attributes);
    }
}