<?php

namespace App\Services\User;

use Illuminate\Http\Response;
use App\Exceptions\CustomException;
use Illuminate\Support\Facades\Hash;
use App\DTO\Imput\User\SignInUserInputDTO;
use App\DTO\Output\User\SignInUserOutputDTO;
use App\Interfaces\IRepositories\Base\IDBTransaction;
use App\Interfaces\IServices\User\ISignInUserService;
use App\Repositories\User\UserRepository;
use Exception;

class SignInUserService implements ISignInUserService
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

    public function execute(SignInUserInputDTO $input)
    {
        try {
            $user = $this->userRepository->getUserByEmail(
                $input->email
            );

            if(!$user) {
                throw new Exception("Usuario não encontrado.", Response::HTTP_NOT_FOUND);
            }

            if (! Hash::check($input->password, $user->password)) {
                throw new Exception("Senha invalida.", Response::HTTP_FORBIDDEN);
            }

            $token = $user->createToken($user->email)->plainTextToken;
            $this->transaction->commit();
            return new SignInUserOutputDTO(
                token: $token 
            );
        } catch (\Throwable $error) {
            $this->transaction->rollback();
            return CustomException::exception($error);
        }
    }
}