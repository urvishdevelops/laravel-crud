<?php

use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [ProductController::class, 'index'])->name('products.index');
Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
Route::any('products/store', [ProductController::class, 'storeProduct'])->name('products.store');
