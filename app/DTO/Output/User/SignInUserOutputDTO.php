<?php

namespace App\DTO\Output\User;

class SignInUserOutputDTO 
{
    public function __construct(
        public string $token
    ) {}
}