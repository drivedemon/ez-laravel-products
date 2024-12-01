<?php

namespace Database\Factories;

use App\Enums\ProductStatus;
use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    public function definition(): array
    {
        $category = ProductCategory::factory()->create();
        $name = $this->faker->words(3, true);

        return [
            'product_category_id' => $category->id,
            'name' => $name,
            'description' => $this->faker->realText(100),
            'status' => ProductStatus::DRAFT,
        ];
    }
}
