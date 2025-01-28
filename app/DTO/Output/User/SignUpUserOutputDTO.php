<?php

namespace App\DTO\Output\User;

class SignUpUserOutputDTO 
{
    public function __construct(
        public string $id,
        public string $email
    ) {}
}