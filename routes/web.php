<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;

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

// Route::get('/pesananmasuk', [OrderController::class, "index"]);
Route::get('/payment/{pemesananId}', [PaymentController::class, "index"]);
Route::post('/payment/store/{pemesananId}', [PaymentController::class, 'store'])->name('payment.store');
Route::get('/payment/qris/{pemesananId}', [PaymentController::class, "showQrisForm"])->name('payment.qris');
Route::post('/payment/qris/store/{pemesananId}', [PaymentController::class, "storeQris"])->name('payment.storeQris');
Route::get('/customer/status/{pemesananId}', [PaymentController::class, 'showStatus'])->name('customer.status');



Route::get('/seller/pesanan', [statusControl::class,'seller_pesanan']);
Route::get('seller/{id}/pesanan/detail', [statusControl::class,'seller_pesanan_detail']);