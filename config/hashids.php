<?php

use App\Models\Order;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductVariant;

return [

    /*
    |--------------------------------------------------------------------------
    | Default Connection Name
    |--------------------------------------------------------------------------
    |
    | Here you may specify which of the connections below you wish to use as
    | your default connection for all work. Of course, you may use many
    | connections at once using the manager class.
    |
    */

    'default' => 'main',

    /*
    |--------------------------------------------------------------------------
    | Hashids Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the connections setup for your application. Example
    | configuration has been included, but you may add as many connections as
    | you would like.
    |
    */

    'connections' => [

        'main' => [
            'salt' => 'your-salt-string',
            'length' => 'your-length-integer',
            // 'alphabet' => 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890'
        ],

        Order::class => [
            'salt' => env('HASHIDS_ORDER', 'fdMpJD8QbuAUx9HvJzse'),
            'length' => 10,
            'alphabet' => 'ABCDEFGHIJKLMNPQRSTUVWXYZ0123456789',
        ],
        ProductCategory::class => [
            'salt' => env('HASHIDS_PRODUCT_CATEGORY', 'fdMpJD8QbuAUx9HvJzse'),
            'length' => 10,
            'alphabet' => 'ABCDEFGHIJKLMNPQRSTUVWXYZ0123456789',
        ],
        Product::class => [
            'salt' => env('HASHIDS_PRODUCT', 'fdMpJD8QbuAUx9HvJzse'),
            'length' => 10,
            'alphabet' => 'ABCDEFGHIJKLMNPQRSTUVWXYZ0123456789',
        ],
        ProductVariant::class => [
            'salt' => env('HASHIDS_PRODUCT_VARIANT', 'fdMpJD8QbuAUx9HvJzse'),
            'length' => 10,
            'alphabet' => 'ABCDEFGHIJKLMNPQRSTUVWXYZ0123456789',
        ],

    ],

];
