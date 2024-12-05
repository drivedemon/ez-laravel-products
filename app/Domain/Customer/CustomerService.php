<?php

namespace App\Domain\Customer;

use App\Domain\Customer\Balance\CustomerBalanceDTO;
use App\Models\Customer;

class CustomerService
{
    private CustomerRepository $customerRepository;

    public function __construct(CustomerRepository $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function checkCustomerBalance(int $balance, int $productTotal): void
    {
        if ($balance < $productTotal) {
            throw CustomerException::insufficientCustomerBalance();
        }
    }

    public function updateCustomerBalance(Customer $customer, int $productTotal): Customer
    {
        $dto = new CustomerBalanceDTO;
        $dto->setBalance($customer->balance - $productTotal);

        return $this->customerRepository->update($customer->id, $dto);
    }
}
