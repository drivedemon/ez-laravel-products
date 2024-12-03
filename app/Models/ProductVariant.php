<?php

namespace App\Models;

use App\Presenters\ProductVariantPresenter;
use App\Traits\EloquentDecodeHash;
use App\Traits\Hashidable;
use App\Traits\Presentable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ProductVariant extends Model
{
    use EloquentDecodeHash;
    use HasFactory;
    use Hashidable;
    use Presentable;

    protected $presenter = ProductVariantPresenter::class;

    protected $fillable = [
        'product_id',
        'name',
        'sku',
        'price',
        'stock',
    ];

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

    public function orders(): BelongsToMany
    {
        return $this->belongsToMany(Order::class)
            ->withPivot('quantity')
            ->withTimestamps()
            ->using(OrderProductVariant::class);
    }
}
