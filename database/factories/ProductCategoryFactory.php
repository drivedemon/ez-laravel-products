<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ProductCategoryFactory extends Factory
{
    public function definition(): array
    {
        $name = $this->faker->words(3, true);

        return [
            'name' => $name,
            'description' => $this->faker->realText(100),
            'slug' => Str::slug($name),
        ];
    }
}
