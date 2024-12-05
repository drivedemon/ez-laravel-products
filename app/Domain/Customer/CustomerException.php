<?php

namespace App\Domain\Customer;

use Symfony\Component\HttpKernel\Exception\HttpException;

class CustomerException extends HttpException
{
    public static function insufficientCustomerBalance(): self
    {
        return new self(400, 'insufficient_customer_stock');
    }
}
