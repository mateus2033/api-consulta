<?php

namespace Tests;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Tests\Builders\Cidade\CidadeBuilder;
use Tests\Builders\Consulta\ConsultaBuilder;
use Tests\Builders\Medico\MedicoBuilder;
use Tests\Builders\Paciente\PacienteBuilder;
use Tests\Builders\User\UserBuilder;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication, DatabaseTransactions, DatabaseMigrations;

    public function cidade(): CidadeBuilder 
    {
        return new CidadeBuilder;
    }

    public function consulta(): ConsultaBuilder 
    {
        return new ConsultaBuilder;
    }

    public function medico(): MedicoBuilder 
    {
        return new MedicoBuilder;
    }

    public function paciente(): PacienteBuilder
    {
        return new PacienteBuilder;
    }

    public function user(): UserBuilder
    {
        return new UserBuilder;
    }
}
