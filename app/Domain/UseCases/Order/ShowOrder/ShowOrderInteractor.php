<?php

namespace App\Domain\UseCases\Order\ShowOrder;

use App\Domain\Interfaces\OrderRepository;
use App\Domain\Interfaces\ViewModel;

class ShowOrderInteractor implements ShowOrderInputPort
{
    public function __construct(
        private ShowOrderOutputPort $output,
        private OrderRepository $repository
    ) {
    }

    public function showOrder(ShowOrderRequestModel $request): ViewModel
    {
        $order = $request->getOrder();

        try {
            $order = $this->repository->show($order);
        } catch (\Exception $e) {
            return $this->output->unableToFindOrder(new ShowOrderResponseModel($order), $e);
        }

        return $this->output->OrderFound(
            new ShowOrderResponseModel($order)
        );
    }
}
