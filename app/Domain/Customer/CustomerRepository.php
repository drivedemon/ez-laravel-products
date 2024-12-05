<?php

namespace App\Domain\Customer;

use App\Domain\Customer\Balance\CustomerBalanceDTO;
use App\Models\Customer;

class CustomerRepository
{
    private Customer $customer;

    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    public function update(int $id, CustomerBalanceDTO $dto): Customer
    {
        $customer = $this->customer->find($id);
        $customer->update($dto->toArray());

        return $customer;
    }

    public function find(int $id): Customer
    {
        return $this->customer->find($id);
    }
}
