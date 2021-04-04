<?php

use App\Http\Controllers\Api\SupplierController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\ProductController;
use App\Http\Controllers\Api\CustomerController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\OrderDetailsController;


Route::resource('supplier', SupplierController::class);
Route::resource('category', CategoryController::class);
Route::resource('product', ProductController::class);
Route::resource('customer', CustomerController::class);
Route::resource('order', OrderController::class);
Route::resource('orderDetails', OrderDetailsController::class);


