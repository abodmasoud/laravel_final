<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\web\HomeController::class, 'index'])->name('index');
Route::get('store/{storeId}/products', [\App\Http\Controllers\web\HomeController::class, 'products'])->name('store.products');
Route::get('product/{productId}/buyProduct', [\App\Http\Controllers\web\HomeController::class, 'buyProduct'])->name('buyProduct');

