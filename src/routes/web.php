<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;

Route::get('/products/register', [RegisterController::class, 'create'])->name('products.register');;
Route::post('/products/register', [RegisterController::class, 'store'])->name('products.store');


Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/products/search', [ProductController::class, 'search'])->name('products.search');
Route::put('/products/{productId}/update', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{productId}/delete', [ProductController::class, 'delete'])->name('products.delete');
Route::get('/products/{productId}', [ProductController::class, 'show'])->name('products.show');


