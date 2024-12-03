<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BalanceResource;
use Illuminate\Http\JsonResponse;

class BalanceController extends Controller
{
    public function index(): JsonResponse
    {
        $customer = auth()->user()?->customer;

        $this->authorize('viewBalance', $customer);

        return $this->successResponse(new BalanceResource($customer));
    }
}
