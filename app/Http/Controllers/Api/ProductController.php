<?php

namespace App\Http\Controllers\Api;

use App\Domain\Product\ProductService;
use App\Enums\ProductStatus;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    private ProductService $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index(): JsonResponse
    {
        // Assume Request as status ON_SALE
        $filters['status'] = ProductStatus::ON_SALE;
        // Set paginate by default from requirement
        $products = $this->productService->getProducts($filters, 10);

        return $this->successResponse(ProductResource::collection($products));
    }
}
