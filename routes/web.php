<?php

use App\Http\Controllers\PemesananController;
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

#PEMESANAN
Route::get('/pemesanan', [PemesananController::class, 'index']);
Route::delete('/pemesanan/{id}', [PemesananController::class, 'destroy']);
Route::get('/pembayaran', [PemesananController::class, 'store']);

