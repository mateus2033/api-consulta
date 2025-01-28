<?php

namespace App\Interfaces\IServices\User;

use App\DTO\Output\User\MeUserOutputDTO;

interface IMeUserService 
{
    public function execute(): MeUserOutputDTO;
}