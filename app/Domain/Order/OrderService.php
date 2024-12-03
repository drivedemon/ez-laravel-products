<?php

namespace App\Domain\Order;

use Illuminate\Database\Eloquent\Collection;

class OrderService
{
    private OrderRepository $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function getOrderByCustomerId(int $customerId): Collection
    {
        return $this->orderRepository->getOrderByCustomerId($customerId);
    }
}
