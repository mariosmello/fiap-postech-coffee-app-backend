<?php

namespace App\Domain\Interfaces;

interface UserEntity
{
    public function getId(): int;

    public function getName(): string;

    public function setName(string $name): void;

    public function getEmail(): string;

    public function setEmail(string $email): void;

    public function getDocument(): string;

    public function setDocument(string $document): void;

    public function getPhone(): string;

    public function setPhone(string $phone): void;

    public function setPassword(string $password): void;

    public function getPassword(): string;

}
