<?php

namespace App\Repositories;

use App\Models\User;

class UserRepositoryEloquent implements UserRepository
{
    public function create(array $attributes)
    {
        return User::create($attributes);
    }
}
