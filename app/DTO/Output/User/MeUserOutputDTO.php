<?php

namespace App\DTO\Output\User;

use Illuminate\Support\Facades\Date;

class MeUserOutputDTO 
{
    public function __construct(
        public string $id,
        public string $email,
        public string $created_at
    ) {}
}