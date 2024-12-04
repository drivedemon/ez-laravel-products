<?php

namespace App\Http\Requests;

use App\Models\ProductVariant;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class OrderCreateRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'orders' => ['required', 'array'],
            'orders.*.product_variant_id' => ['required', 'exists:product_variants,id'],
            'orders.*.quantity' => ['required', 'integer', 'min:1'],
        ];
    }

    protected function getValidatorInstance(): Validator
    {
        $data = $this->all();

        if ($this->filled('orders')) {
            foreach ($data['orders'] as $key => $product) {
                if (array_key_exists('product_variant_id', $product)) {
                    $data['orders'][$key]['product_variant_id'] = ProductVariant::decodeHash(
                        $product['product_variant_id']
                    );
                }
            }
        }

        $this->getInputSource()->replace($data);

        return parent::getValidatorInstance();
    }
}
