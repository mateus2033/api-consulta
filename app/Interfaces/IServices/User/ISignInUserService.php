<?php

namespace App\Interfaces\IServices\User;

use App\DTO\Imput\User\SignInUserInputDTO;
use App\DTO\Output\User\SignInUserOutputDTO;

interface ISignInUserService 
{
    public function execute(SignInUserInputDTO $input): SignInUserOutputDTO;
}