<?php

namespace App\Domain\ProductVariant;

use App\Domain\DTO;

class ProductVariantDTO extends DTO
{
    protected $productId;

    protected $name;

    protected $sku;

    protected $price;

    protected $stock;

    public function setStock($stock): void
    {
        $this->stock = $stock;
    }
}
