<?php

namespace App\Repositories;

use App\Domain\Interfaces\UserEntity;
use App\Domain\Interfaces\UserRepository;
use App\Models\User;

class UserDatabaseRepository implements UserRepository
{
    public function exists(UserEntity $user): bool
    {
        return User::where([
            'email' => (string) $user->getEmail(),
        ])->exists();
    }

    public function findByDocument(UserEntity $user): UserEntity
    {
        return User::where([
            'document' => (string) $user->getDocument(),
        ])->firstOrFail();
    }

    public function create(UserEntity $user): UserEntity
    {
        return User::create([
            'name' => $user->getName(),
            'email' => $user->getEmail(),
            'document' => $user->getDocument(),
            'phone' => $user->getPhone(),
            'password' => $user->getPassword(),
        ]);
    }
}
