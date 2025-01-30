<?php

namespace Tests\Feature\Cidade;

use Illuminate\Http\Response;
use Tests\TestCase;

class ListarCidadesTest extends TestCase
{

    public function execute(array $payload)
    {  
        return $this->getJson(route('cidades.listar.cidades',$payload),['Accept' => 'application/json']);
    }

    public function setUp(): void
    {
        parent::setUp();
    }

    public function test_is_should_list_cities()
    {
        $cidades = $this->cidade()->create();

        $payload = [
            'nome' => null,
            'page' => null,
            'perpage' => null,
            'paginate' => null,
        ];
        
        $this->execute($payload)->assertStatus(Response::HTTP_OK); 
        $this->assertDatabaseHas('cidades',['nome' => $cidades->nome]); 
    }

    public function test_should_return_a_list_by_name()
    {
        $cidades_primeira = $this->cidade()
            ->setNome('São Benedito')
            ->create();

        $cidades_segunda = $this->cidade()
           ->setNome('São Paulo')
           ->create();

        $payload = [
            'nome' => 'São',
            'page' => null,
            'perpage' => null,
            'paginate' => null,
        ];

        $this->execute($payload)
            ->assertStatus(Response::HTTP_OK)
            ->assertExactJson([
                [
                    "estado" => $cidades_primeira->estado,
                    "id" => $cidades_primeira->id,
                    "nome" => $cidades_primeira->nome
                ],
                [
                    "estado" => $cidades_segunda->estado,
                    "id" => $cidades_segunda->id,
                    "nome" => $cidades_segunda->nome
                ]      
            ]);
    
        $this->assertDatabaseHas('cidades',['nome' => $cidades_primeira->nome]); 
    }
}