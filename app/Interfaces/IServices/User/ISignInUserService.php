<?php

namespace App\Interfaces\IServices\User;

use App\DTO\Imput\User\SignInUserInputDTO;

interface ISignInUserService 
{
    public function execute(SignInUserInputDTO $input);
}