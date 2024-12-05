<?php

namespace App\Domain\ProductVariant;

use App\Models\ProductVariant;

class ProductVariantRepository
{
    private ProductVariant $productVariant;

    public function __construct(ProductVariant $productVariant)
    {
        $this->productVariant = $productVariant;
    }

    public function find(int $id): ProductVariant
    {
        return $this->productVariant->find($id);
    }

    public function findLockForUpdate(int $id): ProductVariant
    {
        return $this->productVariant->lockForUpdate()->find($id);
    }

    public function update(ProductVariant $productVariant, ProductVariantDTO $dto): ProductVariant
    {
        $productVariant->update($dto->toArray());

        return $productVariant;
    }
}
