<?php

namespace App\Domain\Product;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductService
{
    private ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getProducts(array $filters, ?int $paginate = null): LengthAwarePaginator|Collection
    {
        return $this->productRepository->getProducts($filters, $paginate);
    }
}
