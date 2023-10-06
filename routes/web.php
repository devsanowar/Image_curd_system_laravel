<?php

use App\Http\Controllers\ImageController;
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

Route::get('/', [ImageController::class, 'index'])->name('all.product');
Route::get('/create-product', [ImageController::class, 'create'])->name('create.product');
Route::post('/store-product', [ImageController::class, 'store'])->name('store.product');
Route::get('/edit-product/{id}', [ImageController::class, 'edit'])->name('edit.product');
Route::post('/update-product/{id}', [ImageController::class, 'update'])->name('update.product');
Route::get('/delete-product/{id}', [ImageController::class, 'destroy'])->name('delete.product');
