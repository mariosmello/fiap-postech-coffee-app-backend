<?php

namespace App\Domain\UseCases\Product\CreateProduct;

use App\Domain\Interfaces\ProductFactory;
use App\Domain\Interfaces\ProductRepository;
use App\Domain\Interfaces\ViewModel;

class CreateProductInteractor implements CreateProductInputPort
{
    public function __construct(
        private CreateProductOutputPort $output,
        private ProductRepository $repository,
        private ProductFactory $factory,
    ) {
    }

    public function createProduct(CreateProductRequestModel $request): ViewModel
    {
        $product = $this->factory->make([
            'category_id' => $request->getCategory(),
            'name' => $request->getName(),
            'description' => $request->getDescription(),
            'price' => $request->getPrice(),
        ]);

        try {
            $product = $this->repository->create($product);
        } catch (\Exception $e) {
            return $this->output->unableToCreateProduct(new CreateProductResponseModel($product), $e);
        }

        return $this->output->productCreated(
            new CreateProductResponseModel($product)
        );
    }
}
