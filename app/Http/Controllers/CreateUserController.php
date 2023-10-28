<?php

namespace App\Http\Controllers;

use App\Adapters\ViewModels\JsonResourceViewModel;
use App\Domain\UseCases\User\CreateUser\CreateUserInputPort;
use App\Domain\UseCases\User\CreateUser\CreateUserRequestModel;
use App\Http\Requests\CreateUserRequest;
use Illuminate\Http\JsonResponse;

class CreateUserController extends Controller
{
    public function __construct(
        private CreateUserInputPort $interactor,
    ) {
    }

    public function __invoke(CreateUserRequest $request): ?JsonResponse
    {
        $viewModel = $this->interactor->createUser(
            new CreateUserRequestModel($request->validated())
        );

        if ($viewModel instanceof JsonResourceViewModel) {
            return $viewModel->getResource()
                ->response()
                ->setStatusCode(201);
        }

        return null;
    }
}
