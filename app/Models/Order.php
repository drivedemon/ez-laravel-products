<?php

namespace App\Models;

use App\Enums\OrderStatus;
use App\Presenters\OrderPresenter;
use App\Traits\EloquentDecodeHash;
use App\Traits\Hashidable;
use App\Traits\Presentable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Order extends Model
{
    use EloquentDecodeHash;
    use HasFactory;
    use Hashidable;
    use Presentable;

    protected $presenter = OrderPresenter::class;
    protected $fillable = [
        'customer_id',
        'code',
        'total_price',
        'status',
        'ordered_at',
        'address',
        'subdistrict',
        'district',
        'province',
        'zipcode',
    ];
    protected $casts = [
        'status' => OrderStatus::class,
        'ordered_at' => 'datetime',
    ];

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function productVariants(): BelongsToMany
    {
        return $this->belongsToMany(ProductVariant::class)
            ->withPivot('quantity')
            ->withTimestamps()
            ->using(OrderProductVariant::class);
    }
}
