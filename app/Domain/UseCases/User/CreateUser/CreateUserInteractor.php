<?php

namespace App\Domain\UseCases\User\CreateUser;

use App\Domain\Interfaces\UserFactory;
use App\Domain\Interfaces\UserRepository;
use App\Domain\Interfaces\ViewModel;

class CreateUserInteractor implements CreateUserInputPort
{
    public function __construct(
        private CreateUserOutputPort $output,
        private UserRepository $repository,
        private UserFactory $factory,
    ) {
    }

    public function createUser(CreateUserRequestModel $request): ViewModel
    {
        $user = $this->factory->make([
            'name' => $request->getName(),
            'email' => $request->getEmail(),
            'phone' => $request->getPhone(),
            'document' => $request->getDocument(),
            'password' => $request->getPassword(),
        ]);

        if ($this->repository->exists($user)) {
            return $this->output->userAlreadyExists(new CreateUserResponseModel($user));
        }

        try {
            $user = $this->repository->create($user);
        } catch (\Exception $e) {
            return $this->output->unableToCreateUser(new CreateUserResponseModel($user), $e);
        }

        return $this->output->userCreated(
            new CreateUserResponseModel($user)
        );
    }
}
