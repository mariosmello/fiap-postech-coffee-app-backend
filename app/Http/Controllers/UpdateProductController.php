<?php

namespace App\Http\Controllers;

use App\Adapters\ViewModels\JsonResourceViewModel;
use App\Domain\UseCases\Product\UpdateProduct\UpdateProductInputPort;
use App\Domain\UseCases\Product\UpdateProduct\UpdateProductRequestModel;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\JsonResponse;

class UpdateProductController extends Controller
{
    public function __construct(
        private UpdateProductInputPort $interactor,
    ) {
    }

    public function __invoke(Product $product, UpdateProductRequest $request): ?JsonResponse
    {

        $viewModel = $this->interactor->updateProduct(
            new UpdateProductRequestModel($product, $request->validated())
        );

        if ($viewModel instanceof JsonResourceViewModel) {
            return $viewModel->getResource()
                ->response()
                ->setStatusCode(200);
        }

        return null;
    }
}
