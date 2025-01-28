<?php

namespace App\Http\Controllers;

use App\DTO\Imput\User\{
    SignUpUserInputDTO,
    SignInUserInputDTO
};

use App\Http\Requests\User\{
    SiginInUserRequest,
    SiginUpUserRequest
};

use App\Http\Resources\User\{
    SiginUpResource,
    SiginInResource,
    MeUserResource
};

use App\Services\User\{
    SignInUserService,
    SignUpUserService,
    MeUserService
};

use Illuminate\Http\Response;

class UserController extends Controller 
{
    public function signIn(SiginInUserRequest $requestUser, SignInUserService $serviceUser)
    {   
        $response = $serviceUser->execute(
            input: new SignInUserInputDTO(
                email: $requestUser->email,
                password: $requestUser->password,
            )
        ); 
        
        return (new SiginInResource($response))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }
    
    public function signUp(SiginUpUserRequest $requestUser, SignUpUserService $serviceUser)
    {
        $response = $serviceUser->execute(
            input: new SignUpUserInputDTO(
                email: $requestUser->email,
                password: $requestUser->password,
            )
        );    

        return (new SiginUpResource($response))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function me(MeUserService $meUserService)
    {
        $response = $meUserService->execute();

        return (new MeUserResource($response))
            ->response()
            ->setStatusCode(Response::HTTP_OK);
    }
}