<?php

namespace App\DTO\Imput\User;

class SignInUserInputDTO 
{
    public function __construct(
        public string $email,
        public string $password,
    ) {}

    public function toArray(): array
    {
        return [
            'token' => $this->email,
            'password' => $this->password,
        ];
    }
}