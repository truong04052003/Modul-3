<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::prefix('products')->group(function () {

    //nối route với controller
    Route::get('/', [ProductController::class, 'index'])->name('products.index');
    Route::get('/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/', [ProductController::class, 'store'])->name('products.store');
    Route::get('/{id}', [ProductController::class, 'show'])->name('products.show');
    Route::put('/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::delete('/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
});
