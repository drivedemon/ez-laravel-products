<?php

namespace App\Domain\Order;

use App\Domain\ProductVariant\ProductVariantDTO;
use App\Domain\ProductVariant\ProductVariantRepository;
use App\Enums\OrderStatus;
use App\Models\Customer;
use App\Models\Order;
use App\Utils\RegexGenerator;
use Illuminate\Database\Eloquent\Collection;

class OrderService
{
    private OrderRepository $orderRepository;

    private ProductVariantRepository $productVariantRepository;

    public function __construct(OrderRepository $orderRepository, ProductVariantRepository $productVariantRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->productVariantRepository = $productVariantRepository;
    }

    public function createOrder(Customer $customer, int $productTotal): Order
    {
        $dto = new OrderDTO;
        $dto->setCustomerId($customer->id);
        $dto->setCode(RegexGenerator::generateSixDigit());
        $dto->setTotalPrice($productTotal);
        $dto->setStatus(OrderStatus::PROCESSING);
        $dto->setOrderedAt(now());
        $dto->setAddress($customer->address);
        $dto->setSubdistrict($customer->subdistrict);
        $dto->setDistrict($customer->district);
        $dto->setProvince($customer->province);
        $dto->setZipcode($customer->zipcode);

        return $this->orderRepository->create($dto);
    }

    public function sumAvailableStock(array $orders): int
    {
        $total = 0;

        foreach ($orders as $order) {
            $productVariant = $this->productVariantRepository->find($order['product_variant_id']);

            if ($order['quantity'] > $productVariant->stock) {
                throw OrderException::insufficientProductStock();
            }

            $total += $productVariant->price * $order['quantity'];
        }

        return $total;
    }

    public function updateProductStockByOrders(Order $order, array $data): void
    {
        foreach ($data as $orderData) {
            $productVariant = $this->productVariantRepository->findLockForUpdate($orderData['product_variant_id']);
            $stock = $productVariant->stock - $orderData['quantity'];

            $order->productVariants()->attach($productVariant->id, ['quantity' => $orderData['quantity']]);

            $dto = new ProductVariantDTO;
            $dto->setStock($stock);

            $this->productVariantRepository->update($productVariant, $dto);
        }
    }

    public function getOrderByCustomerId(int $customerId): Collection
    {
        return $this->orderRepository->getOrderByCustomerId($customerId);
    }
}
