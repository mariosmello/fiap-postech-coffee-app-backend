<?php

namespace App\Domain\UseCases\Product\FindProduct;

use App\Domain\Interfaces\ProductFactory;
use App\Domain\Interfaces\ProductRepository;
use App\Domain\Interfaces\ViewModel;

class FindProductInteractor implements FindProductInputPort
{
    public function __construct(
        private FindProductOutputPort $output,
        private ProductRepository $repository,
        private ProductFactory $factory,
    ) {
    }

    public function findProduct(FindProductRequestModel $request): ViewModel
    {
        $product = $this->factory->make([
            'category_id' => $request->getCategory(),
        ]);

        try {
            $products = $this->repository->findByCategory($product);
        } catch (\Exception $e) {
            return $this->output->unableToFindProduct(new FindProductResponseModel($product), $e);
        }

        return $this->output->productFound(
            new FindProductResponseModel($products)
        );
    }
}
