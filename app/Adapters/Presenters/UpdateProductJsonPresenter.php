<?php

namespace App\Adapters\Presenters;

use App\Adapters\ViewModels\JsonResourceViewModel;
use App\Domain\Interfaces\ViewModel;
use App\Domain\UseCases\Product\UpdateProduct\UpdateProductOutputPort;
use App\Domain\UseCases\Product\UpdateProduct\UpdateProductResponseModel;
use App\Http\Resources\ProductAlreadyExistsResource;
use App\Http\Resources\ProductCreatedResource;
use App\Http\Resources\UnableToCreateResource;

class UpdateProductJsonPresenter implements UpdateProductOutputPort
{
    public function productUpdated(UpdateProductResponseModel $model): ViewModel
    {
        return new JsonResourceViewModel(
            new ProductCreatedResource($model->getProduct()), 'Produto editado com sucesso'
        );
    }

    public function productAlreadyExists(UpdateProductResponseModel $model): ViewModel
    {
        return new JsonResourceViewModel(
            new ProductAlreadyExistsResource($model->getProduct())
        );
    }

    public function unableToUpdateProduct(UpdateProductResponseModel $model, \Throwable $e): ViewModel
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
