<?php

namespace App\Domain\Order;

use App\Models\Order;
use Illuminate\Database\Eloquent\Collection;

class OrderRepository
{
    private Order $order;

    public function __construct(Order $order)
    {
        $this->order = $order;
    }

    public function create(OrderDTO $dto): Order
    {
        return $this->order->create($dto->toArray());
    }

    public function getOrderByCustomerId(int $customerId): Collection
    {
        return $this->order->where('customer_id', $customerId)->get();
    }
}
