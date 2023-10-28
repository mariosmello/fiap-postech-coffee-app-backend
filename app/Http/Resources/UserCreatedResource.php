<?php

namespace App\Http\Resources;

use App\Domain\Interfaces\UserEntity;
use Illuminate\Http\Resources\Json\JsonResource;

class UserCreatedResource extends JsonResource
{
    protected UserEntity $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function toArray($request = [])
    {
        return [
            'id' => $this->user->getId(),
            'name' => $this->user->getName(),
            'email' => $this->user->getEmail()
        ];
    }
}
