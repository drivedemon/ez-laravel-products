<?php

namespace App\Models;

use App\Traits\EloquentDecodeHash;
use App\Traits\Hashidable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Code extends Model
{
    use EloquentDecodeHash;
    use HasFactory;
    use Hashidable;

    protected $fillable = [
        'order_id',
        'code',
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}
