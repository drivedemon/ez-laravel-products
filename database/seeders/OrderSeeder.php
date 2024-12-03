<?php

namespace Database\Seeders;

use App\Models\Customer;
use App\Models\Order;
use App\Models\ProductVariant;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $customer = Customer::first();
        $completedOrders = Order::factory()->completed()->count(2)->create(['customer_id' => $customer->id]);
        $processingOrders = Order::factory()->processing()->count(4)->create(['customer_id' => $customer->id]);

        foreach ($completedOrders as $order) {
            $productVariant = ProductVariant::inRandomOrder()->first();
            $quantity = rand(1, $productVariant->stock);
            $order->update(['total_price' => $productVariant->price * $quantity]);
            $order->productVariants()->attach($productVariant->id, ['quantity' => $quantity]);
        }

        foreach ($processingOrders as $order) {
            $productVariant = ProductVariant::inRandomOrder()->first();
            $quantity = rand(1, $productVariant->stock);
            $order->update(['total_price' => $productVariant->price * $quantity]);
            $order->productVariants()->attach($productVariant->id, ['quantity' => $quantity]);
        }
    }
}
