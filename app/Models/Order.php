<?php

namespace App\Models;

use App\Traits\EloquentDecodeHash;
use App\Traits\Hashidable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use EloquentDecodeHash;
    use HasFactory;
    use Hashidable;

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

    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }

    public function productVariants(): BelongsToMany
    {
        return $this->belongsToMany(ProductVariant::class)->withPivot('quantity')->withTimestamps();
    }
}
