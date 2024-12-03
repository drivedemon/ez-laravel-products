<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductVariantResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->hashid,
            'name' => $this->name,
            'sku' => $this->sku,
            'price' => $this->present()->price,
            'stock' => $this->when(is_null(optional($this->pivot)->quantity), $this->present()->stock),
            'quantity' => $this->when(! is_null(optional($this->pivot)->quantity), optional($this->pivot)->quantity),
            'product' => new ProductResource($this->whenLoaded('product')),
            'created_at' => $this->created_at->timestamp,
            'updated_at' => $this->updated_at->timestamp,
        ];
    }
}
