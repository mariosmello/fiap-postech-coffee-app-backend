<?php

namespace App\Http\Controllers;

use App\Adapters\ViewModels\JsonResourceViewModel;
use App\Domain\UseCases\Product\CreateProduct\CreateProductInputPort;
use App\Domain\UseCases\Product\CreateProduct\CreateProductRequestModel;
use App\Http\Requests\CreateProductRequest;
use Illuminate\Http\JsonResponse;

class CreateProductController extends Controller
{
    public function __construct(
        private CreateProductInputPort $interactor,
    ) {
    }

    public function __invoke(CreateProductRequest $request): ?JsonResponse
    {

        $viewModel = $this->interactor->createProduct(
            new CreateProductRequestModel($request->validated())
        );

        if ($viewModel instanceof JsonResourceViewModel) {
            return $viewModel->getResource()
                ->response()
                ->setStatusCode(201);
        }

        return null;
    }
}
