<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BalanceResource;
use Illuminate\Http\JsonResponse;

class BalanceController extends Controller
{
    public function __construct()
    {
    }

    public function index(): JsonResponse
    {
        $user = auth()->user();

        try {
            $customer = $user->customer;

            return $this->successResponse(new BalanceResource($customer));
        } catch (\Exception $exception) {
            return $this->exceptionResponse($exception);
        }
    }
}
