<?php

namespace App\Factories;

use App\Domain\Interfaces\UserEntity;
use App\Domain\Interfaces\UserFactory;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserModelFactory implements UserFactory
{
    public function make(array $attributes = []): UserEntity
    {

        if (isset($attributes['password']) && is_string($attributes['password'])) {
            $attributes['password'] = Hash::make($attributes['password']);
        }

        return new User($attributes);
    }
}
