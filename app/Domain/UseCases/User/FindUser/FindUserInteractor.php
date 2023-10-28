<?php

namespace App\Domain\UseCases\User\FindUser;

use App\Domain\Interfaces\UserFactory;
use App\Domain\Interfaces\UserRepository;
use App\Domain\Interfaces\ViewModel;

class FindUserInteractor implements FindUserInputPort
{
    public function __construct(
        private FindUserOutputPort $output,
        private UserRepository $repository,
        private UserFactory $factory,
    ) {
    }

    public function findUser(FindUserRequestModel $request): ViewModel
    {
        $user = $this->factory->make([
            'document' => $request->getDocument(),
        ]);

        try {
            $user = $this->repository->findByDocument($user);
        } catch (\Exception $e) {
            return $this->output->unableToFindUser(new FindUserResponseModel($user), $e);
        }

        return $this->output->userFound(
            new FindUserResponseModel($user)
        );
    }
}
