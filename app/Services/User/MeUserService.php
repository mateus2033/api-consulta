<?php

namespace App\Services\User;

use App\DTO\Output\User\MeUserOutputDTO;
use App\Exceptions\CustomException;
use App\Models\User;
use App\Interfaces\IServices\User\IMeUserService;
use App\Repositories\User\UserRepository;
use Illuminate\Support\Facades\Auth;

class MeUserService implements IMeUserService
{
    private UserRepository $userRepository;

    public function __construct(
        UserRepository $userRepository
    ){
        $this->userRepository = $userRepository;
    }
    
    public function execute(): MeUserOutputDTO
    {
        try {
            $user = $this->userRepository->findById(Auth::id());

            return new MeUserOutputDTO(
                id: $user->id, 
                email: $user->email,
                created_at: $user->created_at
            );
        } catch (\Throwable $error) {
            return CustomException::exception($error);
        }
    }
}