<?php

namespace App\Policies;

use App\Models\Customer;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class CustomerPolicy
{
    use HandlesAuthorization;

    public function viewBalance(User $user, Customer $customer): bool
    {
        return $user->id === $customer->user_id;
    }
}
