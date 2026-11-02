<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::resource('products', ProductController::class);

Route::get('/', function () {
    return redirect()->route('products.index')
    ->with('status', 'Successful redirect');
});