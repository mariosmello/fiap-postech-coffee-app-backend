<?php

namespace App\Domain\UseCases\Product\DeleteProduct;

use App\Domain\Interfaces\ProductFactory;
use App\Domain\Interfaces\ProductRepository;
use App\Domain\Interfaces\ViewModel;

class DeleteProductInteractor implements DeleteProductInputPort
{
    public function __construct(
        private DeleteProductOutputPort $output,
        private ProductRepository $repository,
        private ProductFactory $factory,
    ) {
    }

    public function deleteProduct(DeleteProductRequestModel $request): ViewModel
    {
        $product = $request->getProduct();

        try {
            $product = $this->repository->delete($product);
        } catch (\Exception $e) {
            return $this->output->unableToDeleteProduct(new DeleteProductResponseModel($product), $e);
        }

        return $this->output->productDeleted(
            new DeleteProductResponseModel($product)
        );
    }
}
