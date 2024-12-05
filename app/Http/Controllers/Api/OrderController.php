<?php

namespace App\Http\Controllers\Api;

use App\Domain\Customer\CustomerException;
use App\Domain\Customer\CustomerService;
use App\Domain\Order\OrderException;
use App\Domain\Order\OrderService;
use App\Http\Controllers\Controller;
use App\Http\Requests\OrderCreateRequest;
use App\Http\Resources\OrderResource;
use App\Http\Resources\RedemptionCodeResource;
use App\Models\Order;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    private CustomerService $customerService;

    private OrderService $orderService;

    public function __construct(CustomerService $customerService, OrderService $orderService)
    {
        $this->customerService = $customerService;
        $this->orderService = $orderService;
    }

    public function store(OrderCreateRequest $request): JsonResponse
    {
        $customer = auth()->user()->customer;
        $data = $request->validated();

        try {
            DB::beginTransaction();

            $productTotal = $this->orderService->sumAvailableStock($data['orders']);
            $this->customerService->checkCustomerBalance($customer->balance, $productTotal);

            $order = $this->orderService->createOrder($customer, $productTotal);
            $this->orderService->updateProductStockByOrders($order, $data['orders']);
            $this->customerService->updateCustomerBalance($customer, $productTotal);

            DB::commit();

            return $this->successResponse(new OrderResource($order));
        } catch (Exception|CustomerException|OrderException $exception) {
            DB::rollBack();

            return $this->exceptionResponse($exception);
        }
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
