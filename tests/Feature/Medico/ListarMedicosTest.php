<?php

namespace Tests\Feature\Medico;

use Illuminate\Http\Response;
use Tests\TestCase;

class ListarMedicosTest extends TestCase
{
    public function execute(array $payload)
    {  
        return $this->getJson(route('medicos.listar.medicos', $payload),['Accept' => 'application/json']);
    }

    public function setUp(): void
    {
        parent::setUp();
    }

    public function test_is_should_list_doctos()
    {
        $medico = $this->medico()->create();

        $payload = [
            'nome' => null,
            'page' => null,
            'perpage' => null,
            'paginate' => null,
        ];
        
        $this->execute($payload)->assertStatus(Response::HTTP_OK); 
        $this->assertDatabaseHas('medicos',['nome' => $medico->nome]); 
    }

    public function test_should_return_a_list_doctors_by_name()
    {
        $medico = $this->medico()
            ->setNome('Dra Amanda Santana')
            ->create();

        $payload = [
            'nome' => "Ama",
            'page' => null,
            'perpage' => null,
            'paginate' => null,
        ];

        $this->execute($payload)
            ->assertStatus(Response::HTTP_OK)
            ->assertExactJson([
                "data" => [[
                    [
                        "especialidade" => $medico->especialidade,
                        "id" => $medico->id,
                        "nome" => $medico->nome
                    ]
                ]]
            ]);
    
        $this->assertDatabaseHas('medicos',['nome' => $medico->nome]); 
    }
}