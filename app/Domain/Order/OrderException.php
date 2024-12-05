<?php

namespace App\Domain\Order;

use Symfony\Component\HttpKernel\Exception\HttpException;

class OrderException extends HttpException
{
    public static function insufficientProductStock(): self
    {
        return new self(400, 'insufficient_product_stock');
    }
}
