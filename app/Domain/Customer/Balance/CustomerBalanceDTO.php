<?php

namespace App\Domain\Customer\Balance;

use App\Domain\DTO;

class CustomerBalanceDTO extends DTO
{
    protected $balance;

    public function setBalance($balance): void
    {
        $this->balance = $balance;
    }
}
