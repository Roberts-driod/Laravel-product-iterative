<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::resource('products', ProductController::class);

Route::get('/', function () {
    return redirect()->route('products.index')
    ->with('status', 'Successful redirect');
});

Route::post('/products/{product}/quantity/increase', [ProductController::class, 'increaseQuantity'])
    ->name('products.quantity.increase');

Route::post('/products/{product}/quantity/decrease', [ProductController::class, 'decreaseQuantity'])
    ->name('products.quantity.decrease');