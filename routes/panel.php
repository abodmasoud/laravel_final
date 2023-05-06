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


Route::prefix('panel')->middleware('guest:user')->group(function (){
    Route::get('login', [\App\Http\Controllers\panel\auth\AuthController::class, 'loginView']);

    Route::post('login', [\App\Http\Controllers\panel\auth\AuthController::class, 'login'])->name('login');
});

//عملت تعليق عشان ما عملت تشفير لسا 
// Route::prefix('panel')->middleware('auth:user')->group(function (){
Route::prefix('panel')->group(function (){

    Route::get('logout', [\App\Http\Controllers\panel\auth\AuthController::class, 'logout'])->name('logout');

    Route::resource('stores', \App\Http\Controllers\panel\StoreController::class);
    Route::post('store/{id}/restore', [\App\Http\Controllers\panel\StoreController::class, 'restore'])->name('stores.restore');

    Route::resource('products', \App\Http\Controllers\panel\ProductController::class);
    Route::post('product/{id}/restore', [\App\Http\Controllers\panel\ProductController::class, 'restore'])->name('products.restore');

    Route::get('payment_report', [\App\Http\Controllers\panel\PaymentTransactionController::class, 'payment_report'])->name('payment_report');
    Route::get('product_report', [\App\Http\Controllers\panel\PaymentTransactionController::class, 'product_report'])->name('product_report');

});
