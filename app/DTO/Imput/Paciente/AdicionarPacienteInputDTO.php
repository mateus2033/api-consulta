<?php

namespace App\DTO\Imput\Paciente;

class AdicionarPacienteInputDTO 
{
    public function __construct(
        public string $nome, 
        public string $cpf, 
        public string $celular
    ){}
}