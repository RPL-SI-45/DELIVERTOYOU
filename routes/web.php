<?php

use App\Http\Controllers\KategoriAdminController;
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

Route::get('/kategori_admin',[KategoriAdminController::class,'index']);
Route::get('/kategori_admin/create',[KategoriAdminController::class,'create']);
Route::post('/kategori_admin/store',[KategoriAdminController::class,'store']);
Route::get('/kategori_admin/{id}/edit',[KategoriAdminController::class,'edit']);
Route::put('/kategori_admin/{id}',[KategoriAdminController::class,'update']);
Route::delete('/kategori_admin/{id}',[KategoriAdminController::class,'destroy']);

