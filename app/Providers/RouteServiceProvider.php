<?php

namespace App\Providers;

use App\Models\Order;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductVariant;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * The path to your application's "home" route.
     *
     * Typically, users are redirected here after authentication.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, and other route configuration.
     */
    public function boot(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });

        Route::bind('order', function ($value) {
            return Order::where('id', Order::decodeHash($value))->firstOrFail();
        });
        Route::bind('productCategory', function ($value) {
            return ProductCategory::where('id', ProductCategory::decodeHash($value))->firstOrFail();
        });
        Route::bind('product', function ($value) {
            return Product::where('id', Product::decodeHash($value))->firstOrFail();
        });
        Route::bind('productVariant', function ($value) {
            return ProductVariant::where('id', ProductVariant::decodeHash($value))->firstOrFail();
        });

        $this->routes(function () {
            Route::middleware('api')
                ->prefix('api')
                ->group(base_path('routes/api.php'));

            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            if (! app()->environment('production')) {
                Route::middleware('api')
                    ->group(base_path('routes/dev.php'));
            }
        });
    }
}
