<?php

use App\Http\Controllers\Api\BalanceController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('login', [LoginController::class, 'login'])->name('login');
Route::post('check-credential', [LoginController::class, 'checkCredential'])->name('check_credential');

Route::resource('products', ProductController::class)->only(['index']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('codes', [OrderController::class, 'getRedemptionCodes'])->name('codes');

    Route::resource('orders', OrderController::class)->only(['show', 'store']);
    Route::resource('balance', BalanceController::class)->only(['index']);
});
