<?php

namespace Tests\Feature\Medico;

use Carbon\Carbon;
use Illuminate\Http\Response;
use Tests\TestCase;

class AgendarConsultaTest extends TestCase
{
    private string $token;

    public function execute(array $payload)
    {  
        return $this->postJson(route('medicos.consulta.agendar.consulta'),$payload,['authorization' => 'Bearer ' . $this->token, 'Accept' => 'application/json']);
    }

    public function setUp(): void
    {
        parent::setUp();
        $user = $this->user()->create();
        $this->token = $user->createToken($user->email)->plainTextToken;
    }

    public function test_you_should_make_an_appointment()
    {
        $medico = $this->medico()->create();
        $paciente = $this->paciente()->create();

        $payload = [
            'medico_id' => $medico->id,
            'paciente_id' => $paciente->id,
            'data_contula' =>  Carbon::now()->format('Y-m-d H:i:s')
        ];

        $this->execute($payload)->assertStatus(Response::HTTP_CREATED); 
        $this->assertDatabaseHas('consultas',['medico_id' => $medico->id]); 
    }
}