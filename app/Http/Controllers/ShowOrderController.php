<?php

namespace App\Http\Controllers;

use App\Adapters\ViewModels\JsonResourceViewModel;
use App\Domain\UseCases\Order\ShowOrder\ShowOrderInputPort;
use App\Domain\UseCases\Order\ShowOrder\ShowOrderRequestModel;
use App\Models\Order;
use Illuminate\Http\JsonResponse;

class ShowOrderController extends Controller
{
    public function __construct(
        private ShowOrderInputPort $interactor,
    ) {
    }

    public function __invoke(Order $order): ?JsonResponse
    {

        $viewModel = $this->interactor->showOrder(
            new ShowOrderRequestModel($order)
        );

        if ($viewModel instanceof JsonResourceViewModel) {

            return $viewModel->getResource()
                ->response()
                ->setStatusCode(200);
        }

        return null;
    }
}
