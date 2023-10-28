<?php

namespace App\Http\Controllers;

use App\Adapters\ViewModels\JsonResourceViewModel;
use App\Domain\UseCases\Order\CreateOrder\CreateOrderInputPort;
use App\Domain\UseCases\Order\CreateOrder\CreateOrderRequestModel;
use App\Http\Requests\CreateOrderRequest;
use Illuminate\Http\JsonResponse;

class CreateOrderController extends Controller
{
    public function __construct(
        private CreateOrderInputPort $interactor,
    ) {
    }

    public function __invoke(CreateOrderRequest $request): ?JsonResponse
    {

        $viewModel = $this->interactor->createOrder(
            new CreateOrderRequestModel($request->validated())
        );

        if ($viewModel instanceof JsonResourceViewModel) {
            return $viewModel->getResource()
                ->response()
                ->setStatusCode(201);
        }

        return null;
    }
}
