<?php

namespace App\Http\Controllers\Api;

use App\Domain\Order\OrderService;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderCreateRequest;
use App\Http\Resources\OrderResource;
use App\Http\Resources\RedemptionCodeResource;
use App\Models\Order;
use Illuminate\Http\JsonResponse;

class OrderController extends Controller
{
    private OrderService $orderService;

    public function __construct(OrderService $orderService)
    {
        $this->orderService = $orderService;
    }

    public function store(OrderCreateRequest $request)
    {
        $customer = auth()->user()->customer;
        dd($customer, $request->all());
    }

    public function show(Order $order): JsonResponse
    {
        $this->authorize('view', $order);

        $order->load(['productVariants']);

        return $this->successResponse(new OrderResource($order));
    }

    public function getRedemptionCodes(): JsonResponse
    {
        $customer = auth()->user()->customer;
        $codes = $this->orderService->getOrderByCustomerId($customer->id);

        return $this->successResponse(RedemptionCodeResource::collection($codes));
    }
}
