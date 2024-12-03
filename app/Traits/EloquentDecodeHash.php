<?php

namespace App\Traits;

use Vinkla\Hashids\Facades\Hashids;

trait EloquentDecodeHash
{
    public static function decodeHash($hash): string
    {
        $id = Hashids::connection(get_called_class())->decode($hash);
        if ($id) {
            $id = $id[0];
        } else {
            $id = -1;
        }

        return $id;
    }
}
