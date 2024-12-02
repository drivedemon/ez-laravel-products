<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductVariant;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        ProductCategory::factory()
            ->count(5)
            ->create()
            ->each(function ($productCategory) {
                Product::factory()
                    ->count(5)
                    ->create(['product_category_id' => $productCategory->id])
                    ->each(function ($product) {
                        ProductVariant::factory()
                            ->count(2)
                            ->create(['product_id' => $product->id]);
                    });
            });
    }
}
