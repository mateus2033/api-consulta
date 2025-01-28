<?php

namespace App\Interfaces\IRepositories\User;

use App\Models\User;

interface IUserRepository 
{
    public function create(array $data);
}