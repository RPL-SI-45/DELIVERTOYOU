<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\paymentController;

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
Route::get('/payment/{pemesananId}', [paymentController::class, "index"]);
Route::post('/payment/store/{pemesananId}', [paymentController::class, "store"]);
Route::post('/payment/qris/{pemesananId}', [paymentController::class, "storeqris"])->name('customerqris');

Route::get('/seller/pesanan', [statusControl::class,'seller_pesanan']);
Route::get('seller/{id}/pesanan/detail', [statusControl::class,'seller_pesanan_detail']);