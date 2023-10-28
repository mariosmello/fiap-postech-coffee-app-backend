<?php

namespace App\Adapters\Presenters;

use App\Adapters\ViewModels\JsonResourceViewModel;
use App\Domain\Interfaces\ViewModel;
use App\Domain\UseCases\Product\CreateProduct\CreateProductOutputPort;
use App\Domain\UseCases\Product\CreateProduct\CreateProductResponseModel;
use App\Http\Resources\ProductAlreadyExistsResource;
use App\Http\Resources\ProductCreatedResource;
use App\Http\Resources\UnableToCreateResource;

class CreateProductJsonPresenter implements CreateProductOutputPort
{
    public function productCreated(CreateProductResponseModel $model): ViewModel
    {
        return new JsonResourceViewModel(
            new ProductCreatedResource($model->getProduct()), 'Produto cadastrado com sucesso'
        );
    }

    public function productAlreadyExists(CreateProductResponseModel $model): ViewModel
    {
        return new JsonResourceViewModel(
            new ProductAlreadyExistsResource($model->getProduct())
        );
    }

    public function unableToCreateProduct(CreateProductResponseModel $model, \Throwable $e): ViewModel
    {
        if (config('app.debug')) {
            // rethrow and let Laravel display the error
            throw $e;
        }

        return new JsonResourceViewModel(
            new UnableToCreateResource($e)
        );
    }
}
