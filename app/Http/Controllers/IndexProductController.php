<?php

namespace App\Http\Controllers;

use App\Adapters\ViewModels\JsonResourceViewModel;
use App\Domain\UseCases\Product\FindProduct\FindProductInputPort;
use App\Domain\UseCases\Product\FindProduct\FindProductRequestModel;
use App\Http\Requests\FindProductRequest;
use Illuminate\Http\JsonResponse;

class IndexProductController extends Controller
{
    public function __construct(
        private FindProductInputPort $interactor,
    ) {
    }

    public function __invoke(FindProductRequest $request): ?JsonResponse
    {

        $viewModel = $this->interactor->findProduct(
            new FindProductRequestModel($request->validated())
        );

        if ($viewModel instanceof JsonResourceViewModel) {

            return $viewModel->getResource()
                ->response()
                ->setStatusCode(200);
        }

        return null;
    }
}
