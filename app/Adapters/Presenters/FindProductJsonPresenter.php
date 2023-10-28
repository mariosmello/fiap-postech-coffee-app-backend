<?php

namespace App\Adapters\Presenters;

use App\Adapters\ViewModels\JsonResourceViewModel;
use App\Domain\Interfaces\ViewModel;
use App\Domain\UseCases\Product\FindProduct\FindProductOutputPort;
use App\Domain\UseCases\Product\FindProduct\FindProductResponseModel;
use App\Http\Resources\ProductFoundResource;
use App\Http\Resources\UnableToFindResource;

class FindProductJsonPresenter implements FindProductOutputPort
{
    public function productFound(FindProductResponseModel $model): ViewModel
    {
        return new JsonResourceViewModel(
            new ProductFoundResource($model->getProduct())
        );
    }

    public function unableToFindProduct(FindProductResponseModel $model, \Throwable $e): ViewModel
    {
        return new JsonResourceViewModel(
            new UnableToFindResource($e)
        );
    }
}
