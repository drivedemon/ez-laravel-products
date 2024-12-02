<?php

namespace App\Models;

use App\Traits\EloquentDecodeHash;
use App\Traits\Hashidable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    use EloquentDecodeHash;
    use HasFactory;
    use Hashidable;

    protected $fillable = [
        'user_id',
        'first_name',
        'last_name',
        'birth_date',
        'gender',
        'balance',
        'address',
        'subdistrict',
        'district',
        'province',
        'zipcode',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
