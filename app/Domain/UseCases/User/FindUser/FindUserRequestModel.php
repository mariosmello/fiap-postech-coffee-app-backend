<?php

namespace App\Domain\UseCases\User\FindUser;

class FindUserRequestModel
{

    public function __construct(
        private array $attributes
    ) {
    }

    public function getDocument(): string
    {
        return $this->attributes['document'] ?? '';
    }
}
