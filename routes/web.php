<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\Order_detailController;
use App\Http\Controllers\CustomerController;
Route::get('/', function () {
    return view('layouts.layout');
});
Route::resource('products', ProductController::class);
Route::resource('orders', OrderController::class);
Route::resource('order_details', Order_detailController::class);
Route::resource('customers', CustomerController::class);
Route::get('/customers/{id}/history', [CustomerController::class, 'history'])->name('customers.history');

