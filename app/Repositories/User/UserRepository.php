<?php

namespace App\Repositories\User;

use App\Repositories\Base\BaseRepository;
use App\Interfaces\IRepositories\User\IUserRepository;
use App\Models\User;

class UserRepository extends BaseRepository implements IUserRepository
{
    protected $modelClass = User::class;

    public function getUserByEmail(string $email)
    {   
        return $this->getModel()->newQuery()->where('email', $email)->first();
    }
}