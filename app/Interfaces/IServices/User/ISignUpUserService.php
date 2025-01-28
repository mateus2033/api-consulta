<?php

namespace App\Interfaces\IServices\User;

use App\DTO\Imput\User\SignUpUserInputDTO;
use App\DTO\Output\User\SignUpUserOutputDTO;

interface ISignUpUserService 
{
    public function execute(SignUpUserInputDTO $input): SignUpUserOutputDTO;
}