<?php

namespace App\Domain\UseCases\Order\UpdateOrder;

use App\Domain\Interfaces\OrderRepository;
use App\Domain\Interfaces\ViewModel;

class UpdateOrderInteractor implements UpdateOrderInputPort
{
    public function __construct(
        private UpdateOrderOutputPort $output,
        private OrderRepository $repository
    ) {
    }

    public function updateOrder(UpdateOrderRequestModel $request): ViewModel
    {
        $order = $request->getOrder();

        if ($request->getPaymentStatus()) {
            $order['payment_status'] = $request->getPaymentStatus();
        }

        if ($request->getStatus()) {
            $order['status'] = $request->getStatus();
        }

        try {
            $order = $this->repository->update($order);
        } catch (\Exception $e) {
            return $this->output->unableToUpdateOrder(new UpdateOrderResponseModel($order), $e);
        }

        return $this->output->orderUpdated(
            new UpdateOrderResponseModel($order)
        );
    }
}
