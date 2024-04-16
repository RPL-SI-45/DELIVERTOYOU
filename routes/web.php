<?php

use App\Http\Controllers\menuControl;
use App\Http\Controllers\statusControl;
use Illuminate\Support\Facades\Route;

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
















#PENJUAL
Route::get('/seller/menu', [menuControl::class,'seller_menu']);
Route::get('/seller/menu/input', [menuControl::class,'seller_menu_input']);
Route::post('/post',[menuControl::class,'store']);
Route::get('/seller/{id}/menu/edit',[menuControl::class,'seller_menu_edit']);
Route::put('seller/menu/{id}',[menuControl::class,'update']);
Route::get('/menu/{id}',[menuControl::class,'destroy']);


Route::get('/seller/status', [statusControl::class,'seller_status']);
Route::get('seller/{id}/status/detail', [statusControl::class,'seller_status_detail']);
Route::post('/up_to_cook', [statusControl::class,'up_to_cook'])->name('up_to_cook');
Route::get('seller/{id}/status/detail/1', [statusControl::class,'seller_status_detail_1']);
Route::post('/up_to_send', [statusControl::class,'up_to_send'])->name('up_to_send');
Route::get('seller/{id}/status/detail/2', [statusControl::class,'seller_status_detail_2']);
Route::post('/done_status', [statusControl::class,'done_status'])->name('done_status');
Route::get('seller/{id}/status/detail/3', [statusControl::class,'seller_status_detail_3']);
