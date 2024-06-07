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
use App\Http\Controllers\SearchFilterMenu;
use App\Http\Controllers\Auth\LoginController;
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

#LOGIN
Route::get('login', 'App\Http\Controllers\Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'App\Http\Controllers\Auth\LoginController@login')->name('login.post');
Route::get('/admin/login', [LoginController::class, 'showAdminLoginForm'])->name('admin.login');
Route::post('/admin/login', [LoginController::class, 'adminLogin'])->name('admin.login.submit');


#REGISTER
Route::get('register', 'App\Http\Controllers\Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'App\Http\Controllers\Auth\RegisterController@register');

#LOGUT
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

#LANDINGPAGE
Route::get('/', [LandingPageController::class, 'index'])->name('landing');


Route::middleware(['auth', 'redirectIfNotCustomerOrSeller'])->group(function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');
    #FEEDBACK
    Route::get('/order/{id}/history/feedback',[FeedbackController::class,'index']);
    Route::post('/postfeedback',[FeedbackController::class,'store']);
    #EDIT PROFIL TOKO
    Route::get('/edit-profile', 'UserController@editProfile')->name('edit-profile');
    Route::put('/update-profile', [ProfileController::class, 'updateProfile'])->name('update-profile');
    #KERANJANG
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
    Route::post('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
    #PEMESANAN
    Route::get('/pemesanan', [PemesananController::class, 'index']);
    Route::delete('/pemesanan/item/{id}', [PemesananController::class, 'destroyItem'])->name('pemesanan.destroyItem');
    Route::get('/pembayaran', [PemesananController::class, 'store']);
    Route::resource('pemesanan', PemesananController::class);
    Route::post('/pemesanan', [PemesananController::class, 'store'])->name('pemesanan.store');
    Route::patch('/pemesanan/update-quantity/{id}', [PemesananController::class, 'updateQuantity'])->name('pemesanan.updateQuantity');
    Route::post('/submit-alamat', [PemesananController::class, 'submitAlamat'])->name('submit.alamat');
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
    #HALAMAN UTAMA
    Route::get('/customer/{id}/menu', [CardController::class, 'menuwarung']);
    Route::get('/home', [CardController::class, 'halamanutama'])->name('home');
    Route::get('/customer/menu/search', [SearchFilterMenu::class, 'index'])->name('search.filter');
    Route::get('home/filter', [CardController::class, 'filterAllByCategory'])->name('home.filter');
    Route::get('/menuwarung', [CardController::class, 'menuwarung'])->name('menuwarung.filter');
    Route::get('/menuwarung/filter', [CardController::class, 'filterByCategory'])->name('menuwarung.filter');
    #PAYMENT
    Route::get('/payment/{pemesananId}', [PaymentController::class, "index"])->name('payment.index');
    Route::post('/payment/store/{pemesananId}', [PaymentController::class, 'store'])->name('payment.store');
    Route::get('/payment/qris/{pemesananId}', [PaymentController::class, "showQrisForm"])->name('payment.qris');
    Route::post('/payment/qris/store/{pemesananId}', [PaymentController::class, "storeQris"])->name('payment.storeQris');
    #KELOLA STATUS CUSTOMER
    Route::get('/order/status', [StatusControl::class, 'order_status'])->name('order.status');
    Route::get('/order/{id}/status/detail', [statusControl::class,'order_status_detail']);
    #RIWAYAT CUSTOMER
    Route::get('/order/history', [OrderHistoryController::class, 'custhistory'])->name('cust.history');
    Route::get('/order/{id}/history/detail', [OrderHistoryController::class, 'historydetail'])->name('history.detail');
});

Route::middleware(['auth', 'seller'])->group(function () {
    #DASHBOARD
    Route::get('/seller/dash', [SellerDashController::class, 'index'])->name('seller.dash');
    Route::get('/seller/dash/3_month', [SellerDashController::class, 'Month']);
    Route::get('/seller/dash/1_month', [SellerDashController::class, 'index']);
    #PESANAN MASUK PENJUAL
    Route::get('/seller/order', [OrderController::class, 'sellerOrder'])->name('seller.order');
    Route::get('/seller/orders/{id}/detail', [OrderController::class, 'sellerDetail'])->name('seller.detail');
    Route::get('/seller/status/{id}/update', [OrderController::class, 'acc_konfirmasi'])->name('seller_status_update');
    Route::get('/seller/reject/{id}', [OrderController::class, 'reject'])->name('seller.reject');
    #MENU INPUT PENJUAL
    Route::get('/seller/menu', [menuControl::class, 'seller_menu']);
    Route::get('/seller/menu/input', [menuControl::class, 'seller_menu_input']);
    Route::post('/post', [menuControl::class, 'store']);
    Route::get('/seller/{id}/menu/edit', [menuControl::class, 'seller_menu_edit']);
    Route::put('seller/menu/{id}', [menuControl::class, 'update']);
    Route::delete('/menu/{id}', [menuControl::class, 'destroy']);
    #KELOLA STATUS PENJUAL
    Route::get('/seller/status', [statusControl::class, 'seller_status']);
    Route::get('seller/{id}/status/detail', [statusControl::class, 'seller_status_detail']);
    Route::post('/up_to_cook', [statusControl::class, 'up_to_cook'])->name('up_to_cook');
    Route::get('seller/{id}/status/detail/1', [statusControl::class, 'seller_status_detail_1']);
    Route::post('/up_to_send', [statusControl::class, 'up_to_send'])->name('up_to_send');
    Route::get('seller/{id}/status/detail/2', [statusControl::class, 'seller_status_detail_2']);
    Route::post('/done_status', [statusControl::class, 'done_status'])->name('done_status');
    Route::get('seller/{id}/status/detail/3', [statusControl::class, 'seller_status_detail_3']);
    #RIWAYAT PENJUAL
    Route::get('/seller/orderhistory', [OrderHistoryController::class, 'index'])->name('order.history');
    #PROFIL
    Route::get('/profil', [ProfileController::class, 'index']);
    Route::get('/seller/{id}/edit', [SellerDashController::class, 'EditProfileToko']);
    Route::put('/seller/{id}', [SellerDashController::class, 'UpdateProfileToko']);
});
// KATEGORI ADMIN
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/kategori_admin', [KategoriAdminController::class, 'index'])->name('kategori_admin.index');
    Route::get('/kategori_admin/create', [KategoriAdminController::class, 'create'])->name('kategori_admin.create');
    Route::post('/kategori_admin/store', [KategoriAdminController::class, 'store'])->name('kategori_admin.store');
    Route::get('/kategori_admin/{id}/edit', [KategoriAdminController::class, 'edit'])->name('kategori_admin.edit');
    Route::put('/kategori_admin/{id}', [KategoriAdminController::class, 'update'])->name('kategori_admin.update');
    Route::delete('/kategori_admin/{id}', [KategoriAdminController::class, 'destroy'])->name('kategori_admin.destroy');
});

