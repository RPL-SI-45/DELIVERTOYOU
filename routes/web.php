<?php

use App\Http\Controllers\menuControl;
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
Route::post('menu/{id}',[menuControl::class,'destroy']);
