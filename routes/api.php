<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('user', Controllers\IndexUserController::class)->name('user.index');
Route::post('user', Controllers\CreateUserController::class)->name('user.store');

Route::get('product', Controllers\IndexProductController::class)->name('product.index');
Route::post('product', Controllers\CreateProductController::class)->name('product.store');
Route::put('product/{product}', Controllers\UpdateProductController::class)->name('product.update');
Route::delete('product/{product}', Controllers\DeleteProductController::class)->name('product.delete');
