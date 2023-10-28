<?php

namespace App\Domain\UseCases\Product\UpdateProduct;

use App\Domain\Interfaces\ProductFactory;
use App\Domain\Interfaces\ProductRepository;
use App\Domain\Interfaces\ViewModel;

class UpdateProductInteractor implements UpdateProductInputPort
{
    public function __construct(
        private UpdateProductOutputPort $output,
        private ProductRepository $repository,
        private ProductFactory $factory,
    ) {
    }

    public function updateProduct(UpdateProductRequestModel $request): ViewModel
    {
        $product = $request->getProduct();
        $product['category_id'] = $request->getCategory();
        $product['name'] = $request->getName();
        $product['description'] = $request->getDescription();
        $product['price'] = $request->getPrice();

        try {
            $product = $this->repository->update($product);
        } catch (\Exception $e) {
            return $this->output->unableToUpdateProduct(new UpdateProductResponseModel($product), $e);
        }

        return $this->output->productUpdated(
            new UpdateProductResponseModel($product)
        );
    }
}
