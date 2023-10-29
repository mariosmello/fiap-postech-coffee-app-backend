<?php

namespace App\Adapters\Presenters;

use App\Adapters\ViewModels\JsonResourceViewModel;
use App\Domain\Interfaces\ViewModel;
use App\Domain\UseCases\Product\DeleteProduct\DeleteProductOutputPort;
use App\Domain\UseCases\Product\DeleteProduct\DeleteProductResponseModel;
use App\Http\Resources\ProductDeletedResource;
use App\Http\Resources\UnableToDeleteResource;

class DeleteProductJsonPresenter implements DeleteProductOutputPort
{
    public function productDeleted(DeleteProductResponseModel $model): ViewModel
    {
        return new JsonResourceViewModel(
            new ProductDeletedResource($model->getProduct()), 'Produto deletado com sucesso'
        );
    }

    public function unableToDeleteProduct(DeleteProductResponseModel $model, \Throwable $e): ViewModel
    {
        if (config('app.debug')) {
            // rethrow and let Laravel display the error
            throw $e;
        }

        return new JsonResourceViewModel(
            new UnableToDeleteResource($e)
        );
    }
}
