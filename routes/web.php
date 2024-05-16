<?php

use App\Http\Controllers\PemesananController;
use App\Http\Controllers\KategoriAdminController;
use App\Http\Controllers\menuControl;
use App\Http\Controllers\statusControl;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CardController;

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


Route::get('login', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'App\Http\Controllers\Auth\LoginController@login')->name('login.post');
Route::get('register', 'App\Http\Controllers\Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'App\Http\Controllers\Auth\RegisterController@register');


#PEMESANAN
Route::get('/pemesanan', [PemesananController::class, 'index']);
Route::delete('/pemesanan/{id}', [PemesananController::class, 'destroy']);

#KATEGORI ADMIN
Route::get('/kategori_admin',[KategoriAdminController::class,'index']);
Route::get('/kategori_admin/create',[KategoriAdminController::class,'create']);
Route::post('/kategori_admin/store',[KategoriAdminController::class,'store']);
Route::get('/kategori_admin/{id}/edit',[KategoriAdminController::class,'edit']);
Route::put('/kategori_admin/{id}',[KategoriAdminController::class,'update']);
Route::delete('/kategori_admin/{id}',[KategoriAdminController::class,'destroy']);

#HALAMAN UTAMA
Route::get('/customer/menu', [CardController::class, 'menuwarung']);
Route::get('/home', [CardController::class, 'halamanutama'])->name('home');



#PAYMET
Route::get('/payment', [PaymentController::class, 'index']);
Route::get('/payment/{pemesananId}', [PaymentController::class, "index"]);
Route::post('/payment/store/{pemesananId}', [PaymentController::class, 'store'])->name('payment.store');
Route::get('/payment/qris/{pemesananId}', [PaymentController::class, "showQrisForm"])->name('payment.qris');
Route::post('/payment/qris/store/{pemesananId}', [PaymentController::class, "storeQris"])->name('payment.storeQris');
Route::get('/customer/status/{pemesananId}', [PaymentController::class, 'showStatus'])->name('customer.status');

#PESANAN MASUK
Route::get('/seller/order', [OrderController::class, 'sellerOrder'])->name('seller.order');
Route::get('/seller/orders/{id}/detail', [OrderController::class, 'sellerDetail'])->name('seller.detail');


#MENU INPUT PENJUAL
Route::get('/seller/menu', [menuControl::class,'seller_menu']);
Route::get('/seller/menu/input', [menuControl::class,'seller_menu_input']);
Route::post('/post',[menuControl::class,'store']);
Route::get('/seller/{id}/menu/edit',[menuControl::class,'seller_menu_edit']);
Route::put('seller/menu/{id}',[menuControl::class,'update']);
Route::DELETE('/menu/{id}',[menuControl::class,'destroy']);

#KELOLA STATUS PENJUAL
Route::get('/seller/status', [statusControl::class,'seller_status']);
Route::get('seller/{id}/status/detail', [statusControl::class,'seller_status_detail']);
Route::post('/up_to_cook', [statusControl::class,'up_to_cook'])->name('up_to_cook');
Route::get('seller/{id}/status/detail/1', [statusControl::class,'seller_status_detail_1']);
Route::post('/up_to_send', [statusControl::class,'up_to_send'])->name('up_to_send');
Route::get('seller/{id}/status/detail/2', [statusControl::class,'seller_status_detail_2']);
Route::post('/done_status', [statusControl::class,'done_status'])->name('done_status');
Route::get('seller/{id}/status/detail/3', [statusControl::class,'seller_status_detail_3']);

