<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpKernel\Exception\HttpException;

trait ResponseTrait
{
    public function exceptionResponse(HttpException $exception): JsonResponse
    {
        return $this->errorResponse($exception->getMessage(), [], $exception->getStatusCode());
    }

    public function errorResponse(string $message, array $details = [], int $code = 400): JsonResponse
    {
        $response = [
            'is_request_success' => false,
            'message' => $message,
            'details' => $details,
        ];

        return response()->json($response, $code);
    }

    public function successResponse($data = [], int $code = 200): JsonResponse
    {
        $response = [
            'is_request_success' => true,
        ];

        if (is_array($data)) {
            $response['data'] = $data;

            return response()->json($response, $code);
        }

        return $data->additional($response)->response()->setStatusCode($code);
    }
}
