<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class OrderResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->hashid,
            'code' => $this->code,
            'total_price' => $this->present()->totalPrice,
            'status' => $this->status,
            'status_text' => $this->status->label(),
            'ordered_at' => $this->ordered_at?->timestamp,
            'product_variants' => ProductVariantResource::collection($this->whenLoaded('productVariants')),
            'address' => $this->address,
            'subdistrict' => $this->subdistrict,
            'district' => $this->district,
            'province' => $this->province,
            'zipcode' => $this->zipcode,
            'created_at' => $this->created_at->timestamp,
            'updated_at' => $this->updated_at->timestamp,
        ];
    }
}
