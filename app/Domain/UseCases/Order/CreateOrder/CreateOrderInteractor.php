<?php

namespace App\Domain\UseCases\Order\CreateOrder;

use App\Domain\Interfaces\OrderFactory;
use App\Domain\Interfaces\OrderRepository;
use App\Domain\Interfaces\ViewModel;
use Illuminate\Support\Facades\DB;

class CreateOrderInteractor implements CreateOrderInputPort
{
    public function __construct(
        private CreateOrderOutputPort $output,
        private OrderRepository $repository,
        private OrderFactory $factory,
    ) {
    }

    public function createOrder(CreateOrderRequestModel $request): ViewModel
    {
        $order = $this->factory->make([
            'user_id' => $request->getUser(),
        ]);

        try {
            $order = $this->repository->create($order, $request->getProducts());
        } catch (\Exception $e) {
            return $this->output->unableToCreateOrder(new CreateOrderResponseModel($order), $e);
        }

        return $this->output->orderCreated(
            new CreateOrderResponseModel($order)
        );
    }
}
