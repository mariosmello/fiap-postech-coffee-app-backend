<?php

namespace App\Http\Controllers;

use App\Adapters\ViewModels\JsonResourceViewModel;
use App\Domain\UseCases\CreateUser\CreateUserInputPort;
use App\Domain\UseCases\CreateUser\CreateUserRequestModel;
use App\Http\Requests\CreateUserRequest;
use Illuminate\Http\Resources\Json\JsonResource;

class CreateUserController extends Controller
{
    public function __construct(
        private CreateUserInputPort $interactor,
    ) {
    }

    public function __invoke(CreateUserRequest $request): ?JsonResource
    {
        $viewModel = $this->interactor->createUser(
            new CreateUserRequestModel($request->validated())
        );

        if ($viewModel instanceof JsonResourceViewModel) {
            return $viewModel->getResource();
        }

        return null;
    }
}
