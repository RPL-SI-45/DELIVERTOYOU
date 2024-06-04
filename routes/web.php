<?php

use App\Http\Controllers\PemesananController;
use App\Http\Controllers\KategoriAdminController;
use App\Http\Controllers\menuControl;
use App\Http\Controllers\statusControl;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CardController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderHistoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SellerDashController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\SearchFilterMenu;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CartController;


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
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');



Route::middleware(['auth', 'redirectIfNotCustomerOrSeller'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');


#FEEDBACK
Route::get('/order/{id}/status/feedback',[FeedbackController::class,'index']);
Route::post('/postfeedback',[FeedbackController::class,'store']);

#EDIT PROFIL
Route::get('/edit-profile', 'UserController@editProfile')->name('edit-profile');
Route::put('/update-profile', [ProfileController::class, 'updateProfile'])->name('update-profile');



#KERANJANG

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/add-to-cart/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/cart', [CartController::class, 'showCart'])->name('cart.show');
Route::post('/remove-from-cart/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');


#PEMESANAN
Route::get('/pemesanan', [PemesananController::class, 'index']);
Route::delete('/pemesanan/{id}', [PemesananController::class, 'destroy']);
Route::get('/pembayaran', [PemesananController::class, 'store']);
Route::get('/home', function () {
    return view('home');
});

#HALAMAN UTAMA
Route::get('/home', [CardController::class, 'halamanutama']);
Route::get('home/filter', [CardController::class, 'filterAllByCategory'])->name('home.filter');
Route::get('/customer/menu', [CardController::class, 'menuwarung']);
Route::get('/customer/menu/search', [SearchFilterMenu::class, 'index'])->name('search.filter');
Route::get('/menuwarung', [CardController::class, 'menuwarung'])->name('menuwarung.filter');
Route::get('/menuwarung/filter', [CardController::class, 'filterByCategory'])->name('menuwarung.filter');







#PROFIL
Route::get('/profil', [ProfileController::class, 'index']);

#KATEGORI ADMIN
Route::get('/kategori_admin',[KategoriAdminController::class,'index']);
Route::get('/kategori_admin/create',[KategoriAdminController::class,'create']);
Route::post('/kategori_admin/store',[KategoriAdminController::class,'store']);
Route::get('/kategori_admin/{id}/edit',[KategoriAdminController::class,'edit']);
Route::put('/kategori_admin/{id}',[KategoriAdminController::class,'update']);
Route::delete('/kategori_admin/{id}',[KategoriAdminController::class,'destroy']);

#PAYMENT
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

#PESANAN MASUK PENJUAL
Route::get('/seller/order', [OrderController::class, 'sellerOrder'])->name('seller.order');
Route::get('/seller/orders/{id}/detail', [OrderController::class, 'sellerDetail'])->name('seller.detail');
Route::get('/seller/status/{id}/update', [OrderController::class, 'acc_konfirmasi'])->name('seller_status_update');
Route::get('/seller/reject/{id}', [OrderController::class, 'reject'])->name('seller.reject');

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


#KELOLA STATUS CUSTOMER
Route::get('/order/status', [statusControl::class,'order_status']);
Route::get('/order/{id}/status/detail', [statusControl::class,'order_status_detail']);
#RIWAYAT PENJUAL
Route::get('/seller/orderhistory', [OrderHistoryController::class, 'index'])->name('order.history');

    
});

Route::get('/', [LandingPageController::class, 'index'])->name('landing');

#KERANJANG
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

#PEMESANAN
Route::get('/pemesanan', [PemesananController::class, 'index']);
Route::delete('/pemesanan/{id}', [PemesananController::class, 'destroy']);
Route::get('/pembayaran', [PemesananController::class, 'store']);
Route::get('/', function () {
    return view('home');
});

#HALAMAN UTAMA
Route::get('/home', [CardController::class, 'halamanutama']);
Route::get('home/filter', [CardController::class, 'filterAllByCategory'])->name('home.filter');
Route::get('/customer/menu', [CardController::class, 'menuwarung']);
Route::get('/customer/menu/search', [SearchFilterMenu::class, 'index'])->name('search.filter');
Route::get('/menuwarung', [CardController::class, 'menuwarung'])->name('menuwarung.filter');
Route::get('/menuwarung/filter', [CardController::class, 'filterByCategory'])->name('menuwarung.filter');






#PROFIL
Route::get('/profil', [ProfileController::class, 'index']);
Route::get('/seller/{id}/edit', [SellerDashController::class, 'EditProfileToko']);
Route::put('/seller/{id}', [SellerDashController::class, 'UpdateProfileToko']);

#KATEGORI ADMIN
Route::get('/kategori_admin',[KategoriAdminController::class,'index']);
Route::get('/kategori_admin/create',[KategoriAdminController::class,'create']);
Route::post('/kategori_admin/store',[KategoriAdminController::class,'store']);
Route::get('/kategori_admin/{id}/edit',[KategoriAdminController::class,'edit']);
Route::put('/kategori_admin/{id}',[KategoriAdminController::class,'update']);
Route::delete('/kategori_admin/{id}',[KategoriAdminController::class,'destroy']);

#PAYMENT
Route::get('/payment', [PaymentController::class, 'index']);
Route::get('/payment/{pemesananId}', [PaymentController::class, "index"]);
Route::post('/payment/store/{pemesananId}', [PaymentController::class, 'store'])->name('payment.store');
Route::get('/payment/qris/{pemesananId}', [PaymentController::class, "showQrisForm"])->name('payment.qris');
Route::post('/payment/qris/store/{pemesananId}', [PaymentController::class, "storeQris"])->name('payment.storeQris');
Route::get('/customer/status/{pemesananId}', [PaymentController::class, 'showStatus'])->name('customer.status');

#PESANAN MASUK PENJUAL
Route::get('/seller/order', [OrderController::class, 'sellerOrder'])->name('seller.order');
Route::get('/seller/orders/{id}/detail', [OrderController::class, 'sellerDetail'])->name('seller.detail');
Route::get('/seller/status/{id}/update', [OrderController::class, 'acc_konfirmasi'])->name('seller_status_update');
Route::get('/seller/reject/{id}', [OrderController::class, 'reject'])->name('seller.reject');

#MENU INPUT PENJUAL
Route::get('/seller/menu', [menuControl::class,'seller_menu']);
Route::get('/seller/menu/input', [menuControl::class,'seller_menu_input']);
Route::post('/post',[menuControl::class,'store']);
Route::get('/seller/{id}/menu/edit',[menuControl::class,'seller_menu_edit']);
Route::put('seller/menu/{id}',[menuControl::class,'update']);
Route::get('/menu/{id}',[menuControl::class,'destroy']);

#KELOLA STATUS PENJUAL
Route::get('/seller/status', [statusControl::class,'seller_status']);
Route::get('seller/{id}/status/detail', [statusControl::class,'seller_status_detail']);
Route::post('/up_to_cook', [statusControl::class,'up_to_cook'])->name('up_to_cook');
Route::get('seller/{id}/status/detail/1', [statusControl::class,'seller_status_detail_1']);
Route::post('/up_to_send', [statusControl::class,'up_to_send'])->name('up_to_send');
Route::get('seller/{id}/status/detail/2', [statusControl::class,'seller_status_detail_2']);
Route::post('/done_status', [statusControl::class,'done_status'])->name('done_status');
Route::get('seller/{id}/status/detail/3', [statusControl::class,'seller_status_detail_3']);


#KELOLA STATUS CUSTOMER
Route::get('/order/status', [statusControl::class,'order_status']);
Route::get('/order/{id}/status/detail', [statusControl::class,'order_status_detail']);
#RIWAYAT PENJUAL
Route::get('/seller/orderhistory', [OrderHistoryController::class, 'index'])->name('order.history');


#DASHBOARD
Route::get('/seller/dash', [SellerDashController::class,'index']);
Route::get('/seller/dash/1_month', [SellerDashController::class,'Month1']);
