<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\SiginUserRequest;
use Illuminate\Http\Request;

class UserController extends Controller 
{
    public function signIn(SiginUserRequest $siginUserRequest)
    {
        dd($siginUserRequest->validated());
    }
}