<?php

namespace App\Traits;

use Vinkla\Hashids\Facades\Hashids;

trait Hashidable
{
    public function getRouteKey(): string
    {
        return static::encodeHash($this->getKey());
    }

    public function getHashidAttribute(): string
    {
        return static::encodeHash($this->attributes['id']);
    }

    public static function encodeHash($id): string
    {
        return Hashids::connection(get_called_class())->encode($id);
    }
}
