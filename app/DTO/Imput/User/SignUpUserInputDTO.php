<?php

namespace App\DTO\Imput\User;

class SignUpUserInputDTO 
{
    public function __construct(
        public string $email,
        public string $type,
        public string $password
    ) {}

    public function toArray(): array
    {
        return [
            'email' => $this->email,
            'type' => $this->type,
            'password' => $this->password
        ];
    }
}