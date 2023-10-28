<?php

namespace App\Http\Controllers;

use App\Adapters\ViewModels\JsonResourceViewModel;
use App\Domain\UseCases\Product\DeleteProduct\DeleteProductInputPort;
use App\Domain\UseCases\Product\DeleteProduct\DeleteProductRequestModel;
use App\Models\Product;
use Illuminate\Http\JsonResponse;

class DeleteProductController extends Controller
{
    public function __construct(
        private DeleteProductInputPort $interactor,
    ) {
    }

    public function __invoke(Product $product): ?JsonResponse
    {

        $viewModel = $this->interactor->deleteProduct(
            new DeleteProductRequestModel($product)
        );

        if ($viewModel instanceof JsonResourceViewModel) {
            return $viewModel->getResource()
                ->response()
                ->setStatusCode(200);
        }

        return null;
    }
}
