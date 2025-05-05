<?php

use App\Http\Controllers\ProductController;


Route::get('/products', [ProductApiController::class, 'index']);
Route::post('/cart/add', [CartApiController::class, 'addToCart']);
Route::get('/cart', [CartApiController::class, 'list']);
Route::post('/products', [ProductController::class, 'store']);
