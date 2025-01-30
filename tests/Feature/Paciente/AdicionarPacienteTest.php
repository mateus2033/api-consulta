<?php

namespace Tests\Feature\Paciente;

use Illuminate\Http\Response;
use Tests\TestCase;

class AdicionarPacienteTest extends TestCase
{
    private string $token;

    public function execute(array $payload)
    {  
        return $this->postJson(route('pacientes.adidionar.paciente'),$payload,['authorization' => 'Bearer ' . $this->token, 'Accept' => 'application/json']);
    }

    public function setUp(): void
    {
        parent::setUp();
        $user = $this->user()->create();
        $this->token = $user->createToken($user->email)->plainTextToken;
    }

    public function test_must_create_a_patient()
    {
        $paciente = $this->paciente()->create();

        $payload = [
            'nome' => $paciente->nome,
            'cpf' => "950.782.910-59",
            'celular' => "(27) 99999-7777"
        ];
        
        $this->execute($payload)->assertStatus(Response::HTTP_CREATED); 
        $this->assertDatabaseHas('pacientes',['nome' => $paciente->nome]); 
    }
}