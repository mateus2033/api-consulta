<?php

namespace App\Interfaces\IServices\User;

use App\DTO\Imput\User\SignUpUserInputDTO;

interface ISignUpUserService 
{
    public function execute(SignUpUserInputDTO $input);
}