<?php

namespace App\Http\Controllers;

use App\Adapters\ViewModels\JsonResourceViewModel;
use App\Domain\UseCases\Order\FindOrder\FindOrderInputPort;
use App\Domain\UseCases\Order\FindOrder\FindOrderRequestModel;
use App\Http\Requests\FindOrderRequest;
use Illuminate\Http\JsonResponse;

class IndexOrderController extends Controller
{
    public function __construct(
        private FindOrderInputPort $interactor,
    ) {
    }

    public function __invoke(FindOrderRequest $request): ?JsonResponse
    {

        $viewModel = $this->interactor->findOrder(
            new FindOrderRequestModel($request->validated())
        );

        if ($viewModel instanceof JsonResourceViewModel) {

            return $viewModel->getResource()
                ->response()
                ->setStatusCode(200);
        }

        return null;
    }
}
