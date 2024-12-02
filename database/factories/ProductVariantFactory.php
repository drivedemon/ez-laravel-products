<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductVariantFactory extends Factory
{
    public function definition(): array
    {
        $name = $this->faker->words(2, true);

        return [
            'product_id' => Product::inRandomOrder()->first()->id ?? Product::factory(),
            'name' => $name,
            'sku' => Str::slug($name),
            'price' => random_int(10000, 100000),
            'stock' => random_int(0, 100),
        ];
    }
}
