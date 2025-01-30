<?php

namespace Tests\Feature\User;

use Illuminate\Http\Response;
use Tests\TestCase;

class SiginUserTest extends TestCase
{
    public function execute(array $payload)
    { 
        return $this->postJson(route('sign-up'),$payload,['Accept' => 'application/json']);
    }

    public function setUp(): void
    {
        parent::setUp();
    }

    public function test_must_create_a_user()
    {
        $payload = [
            'email' => "eric.bahamas@gmail.com",
            'password' => "12345678"
        ];
        
        $this->execute($payload)
            ->assertStatus(Response::HTTP_CREATED)
            ->assertExactJson([
                "data" => [
                    "id" => "1",
                    "email" => "eric.bahamas@gmail.com" 
                ]
            ]); 
    }
}