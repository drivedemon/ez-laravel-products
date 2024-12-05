<?php

namespace Database\Factories;

use App\Enums\OrderStatus;
use App\Models\Customer;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    public function definition(): array
    {
        return [
            'customer_id' => Customer::inRandomOrder()->first()->id ?? Customer::factory(),
            'code' => $this->faker->regexify('[A-Z]{6}'),
            'total_price' => random_int(10000, 100000),
            'status' => OrderStatus::DRAFT,
            'ordered_at' => null,
            'address' => $this->faker->address,
            'subdistrict' => 'subdistrict BKK',
            'district' => 'district BKK',
            'province' => 'province BKK',
            'zipcode' => 'zipcode BKK',
        ];
    }

    public function processing(): OrderFactory
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => OrderStatus::PROCESSING,
                'ordered_at' => now(),
            ];
        });
    }

    public function completed(): OrderFactory
    {
        return $this->state(function (array $attributes) {
            return [
                'status' => OrderStatus::COMPLETED,
                'ordered_at' => now(),
            ];
        });
    }
}
