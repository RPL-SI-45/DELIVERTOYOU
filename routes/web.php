<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/payment/{pemesananId}', [PaymentController::class, "index"]);
Route::post('/payment/store/{pemesananId}', [PaymentController::class, 'store'])->name('payment.store');
Route::get('/payment/qris/{pemesananId}', [PaymentController::class, "showQrisForm"])->name('payment.qris');
Route::post('/payment/qris/store/{pemesananId}', [PaymentController::class, "storeQris"])->name('payment.storeQris');
Route::get('/customer/status/{pemesananId}', [PaymentController::class, 'showStatus'])->name('customer.status');


Route::get('/seller/order', [OrderController::class, 'sellerOrder'])->name('seller.order');
Route::get('/seller/orders/{id}/detail', [OrderController::class, 'sellerDetail'])->name('seller.detail');