<?php

namespace App\Domain\UseCases\Order\FindOrder;

use App\Domain\Interfaces\OrderFactory;
use App\Domain\Interfaces\OrderRepository;
use App\Domain\Interfaces\ViewModel;

class FindOrderInteractor implements FindOrderInputPort
{
    public function __construct(
        private FindOrderOutputPort $output,
        private OrderRepository $repository,
        private OrderFactory $factory,
    ) {
    }

    public function findOrder(FindOrderRequestModel $request): ViewModel
    {
        $order = $this->factory->make([
            'status' => $request->getStatus(),
        ]);

        try {
            $orders = $this->repository->find($order);
        } catch (\Exception $e) {
            return $this->output->unableToFindOrder(new FindOrderResponseModel($order), $e);
        }

        return $this->output->OrderFound(
            new FindOrderResponseModel($orders)
        );
    }
}
