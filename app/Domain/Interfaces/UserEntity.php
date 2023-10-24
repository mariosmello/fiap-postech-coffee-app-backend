<?php

namespace App\Domain\Interfaces;

use App\Models\HashedPasswordValueObject;
use App\Models\PasswordValueObject;

interface UserEntity
{
    public function getName(): string;

    public function setName(string $name): void;

    public function getEmail(): string;

    public function setEmail(string $email): void;

    public function getPassword(): HashedPasswordValueObject;

    public function setPassword(PasswordValueObject $password): void;
}
