<?php

namespace App\Domain\UseCases\User\CreateUser;

class CreateUserRequestModel
{
    /**
     * @param array<mixed> $attributes
     */
    public function __construct(
        private array $attributes
    ) {
    }

    public function getName(): string
    {
        return $this->attributes['name'] ?? '';
    }

    public function getEmail(): string
    {
        return $this->attributes['email'] ?? '';
    }

    public function getPhone(): string
    {
        return $this->attributes['phone'] ?? '';
    }

    public function getDocument(): string
    {
        return $this->attributes['document'] ?? '';
    }
}
