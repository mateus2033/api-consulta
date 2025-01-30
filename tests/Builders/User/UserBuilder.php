<?php

namespace Tests\Builders\User;

use App\Models\User;

class UserBuilder 
{
    protected $attributes = [];

    public function setId($id = null): self
    {
        $this->attributes['id'] = $id;
        return $this;
    }

    public function setEmail($email = null): self
    {
        $this->attributes['email'] = $email;
        return $this;
    }

    public function setPassword($password = null): self
    {
        $this->attributes['password'] = $password;
        return $this;
    }

    public function create($quantity = null)
    {
        return User::factory($quantity)->create($this->attributes);
    }

    public function make($quantity = null)
    {
        return User::factory($quantity)->make($this->attributes);
    }
}