<?php

namespace App\Policies;

use App\Models\Order;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class OrderPolicy
{
    use HandlesAuthorization;

    public function view(User $user, Order $order): bool
    {
        return $user->customer->id === $order->customer_id;
    }

    public function viewRedemptionCodes(User $user): bool
    {
        return true;
    }
}
