<?php

namespace App\Services\User;

use App\DTO\Imput\User\SignUpUserInputDTO;
use App\DTO\Output\User\SignUpUserOutputDTO;
use App\Exceptions\CustomException;
use App\Interfaces\IRepositories\Base\IDBTransaction;
use App\Interfaces\IServices\User\ISignUpUserService;
use App\Repositories\User\UserRepository;
use Illuminate\Support\Facades\Hash;

class SignUpUserService implements ISignUpUserService
{
    private UserRepository $userRepository;
    private IDBTransaction $transaction;

    public function __construct(
        UserRepository $userRepository,
        IDBTransaction $transaction
    ){
        $this->userRepository = $userRepository;
        $this->transaction = $transaction;
    }

    public function execute(SignUpUserInputDTO $input)
    {
        try {
            $user = $this->userRepository->create([
                'email' => $input->email,
                'password' => Hash::make($input->password)
            ]);
    
            $this->transaction->commit();
            return new SignUpUserOutputDTO(
                id: $user->id,
                email:$user->email
            );
        } catch (\Throwable $error) {
            $this->transaction->rollback();
            return CustomException::exception($error);
        }
    }
}