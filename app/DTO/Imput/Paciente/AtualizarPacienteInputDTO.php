<?php

namespace App\DTO\Imput\Paciente;

class AtualizarPacienteInputDTO 
{
    public function __construct(
        public int $id_paciente,
        public string $nome,
        public string $celular
    ){}
}