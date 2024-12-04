<?php

namespace Database\Factories;

use App\Enums\ProductStatus;
use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        $name = $this->faker->words(3, true);

        return [
            'product_category_id' => ProductCategory::inRandomOrder()->first()->id ?? ProductCategory::factory(),
            'name' => $name,
            'description' => $this->faker->realText(100),
            'status' => ProductStatus::PUBLISHED,
        ];
    }
}
