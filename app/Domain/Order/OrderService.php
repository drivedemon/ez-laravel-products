<?php

namespace App\Domain\Order;

use App\Models\ProductVariant;
use Illuminate\Database\Eloquent\Collection;

class OrderService
{
    private OrderRepository $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
    }

    public function validateAvailableStock(array $orders)
    {
        foreach ($orders as $order) {
            $productVariant = ProductVariant::find($order['product_variant_id']);
        }
    }

    public function getOrderByCustomerId(int $customerId): Collection
    {
        return $this->orderRepository->getOrderByCustomerId($customerId);
    }
}
