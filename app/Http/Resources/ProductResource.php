<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->hashid,
            'name' => $this->name,
            'description' => $this->description,
            'status' => $this->status,
            'status_text' => $this->status->label(),
            'product_category' => new ProductCategoryResource($this->whenLoaded('productCategory')),
            'product_variants' => ProductVariantResource::collection($this->whenLoaded('productVariants')),
            'created_at' => $this->created_at->timestamp,
            'updated_at' => $this->updated_at->timestamp,
        ];
    }
}
