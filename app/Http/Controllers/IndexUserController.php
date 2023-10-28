<?php

namespace App\Http\Controllers;

use App\Adapters\ViewModels\JsonResourceViewModel;
use App\Domain\UseCases\User\FindUser\FindUserInputPort;
use App\Domain\UseCases\User\FindUser\FindUserRequestModel;
use App\Http\Requests\FindUserRequest;
use Illuminate\Http\JsonResponse;

class IndexUserController extends Controller
{
    public function __construct(
        private FindUserInputPort $interactor,
    ) {
    }

    public function __invoke(FindUserRequest $request): ?JsonResponse
    {

        $viewModel = $this->interactor->findUser(
            new FindUserRequestModel($request->validated())
        );

        if ($viewModel instanceof JsonResourceViewModel) {

            return $viewModel->getResource()
                ->response()
                ->setStatusCode(200);
        }

        return null;
    }
}
