<?php

namespace App\Domain\Product;

use App\Enums\ProductStatus;
use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Arr;

class ProductRepository
{
    private Product $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function getProducts(array $filters, ?int $paginate = null): LengthAwarePaginator|Collection
    {
        $products = $this->product
            ->with(['productCategory', 'productVariants'])
            ->where('status', Arr::get($filters, 'status', ProductStatus::PUBLISHED));

        if ($paginate) {
            return $products->paginate($paginate)->withQueryString();
        }

        return $products->get();
    }
}
