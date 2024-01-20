<?php

namespace App\Http\Controllers;

use App\Adapters\ViewModels\JsonResourceViewModel;
use App\Domain\UseCases\Order\UpdateOrder\UpdateOrderInputPort;
use App\Domain\UseCases\Order\UpdateOrder\UpdateOrderRequestModel;
use App\Http\Requests\WebhookUpdateOrderRequest;
use App\Models\Order;
use Illuminate\Http\JsonResponse;

class WebhookUpdateOrderController extends Controller
{
    public function __construct(
        private UpdateOrderInputPort $interactor,
    ) {
    }

    public function __invoke(Order $order, WebhookUpdateOrderRequest $request): ?JsonResponse
    {
        $viewModel = $this->interactor->updateOrder(
            new UpdateOrderRequestModel($order, $request->validated())
        );

        if ($viewModel instanceof JsonResourceViewModel) {
            return $viewModel->getResource()
                ->response()
                ->setStatusCode(200);
        }

        return null;
    }
}
