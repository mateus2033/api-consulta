<?php

namespace Tests\Feature\Medico;

use Illuminate\Http\Response;
use Tests\TestCase;

class AdicionarMedicoTest extends TestCase
{
    private string $token;

    public function execute(array $payload)
    {  
        return $this->postJson(route('medicos.listar.medicos'),$payload,['authorization' => 'Bearer ' . $this->token, 'Accept' => 'application/json']);
    }

    public function setUp(): void
    {
        parent::setUp();
        $user = $this->user()->create();
        $this->token = $user->createToken($user->email)->plainTextToken;
    }

    public function test_is_should_create_doctor()
    {
        $medico = $this->medico()->make();
        $cidade = $this->medico()->create();

        $payload = [
            'nome' => $medico->nome,
            'especialidade' => $medico->especialidade,
            'cidade_id' => $cidade->id
        ];
        
        $this->execute($payload)->assertStatus(Response::HTTP_CREATED); 
        $this->assertDatabaseHas('medicos',['nome' => $medico->nome]); 
    }
}