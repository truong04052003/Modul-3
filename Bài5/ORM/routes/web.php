<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductCodeController;
use App\Http\Controllers\LoginController;

use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\ProductCode;

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
//trả về trang view đăng nhập
Route::get('/login', function () {
    return view('admin.logins.login');
});
//trả về trang view đăng ký
Route::get('/dangky', function () {
    return view('admin.logins.dangky');
});

Route::get('/login', [LoginController::class, 'login'])->name('logins.login');

//PRODUCT===========
Route::prefix('products')->group(function () {

    //nối route với controller
    Route::get('/', [ProductController::class, 'index'])->name('products.index');
    Route::get('/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/', [ProductController::class, 'store'])->name('products.store');
    Route::get('/{id}', [ProductController::class, 'show'])->name('products.show');
    Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
    Route::delete('/', [ProductController::class, 'product_trash'])->name('products.trash');
});
//CATEGORY===================
Route::prefix('categories')->group(function () {
    //nối route với controller
    Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/{id}', [CategoryController::class, 'show'])->name('categories.show');
    Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
});

//ORDERS
Route::prefix('orders')->group(function () {
    //nối route với controller
    Route::get('/', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/create', [OrderController::class, 'create'])->name('orders.create');
    Route::post('/', [OrderController::class, 'store'])->name('orders.store');
    Route::get('/{id}', [OrderController::class, 'show'])->name('orders.show');
    Route::get('/{id}/edit', [OrderController::class, 'edit'])->name('orders.edit');
    Route::put('/{id}', [OrderController::class, 'update'])->name('orders.update');
    Route::delete('/{id}', [OrderController::class, 'destroy'])->name('orders.destroy');
});

//PRODUCTCODE
Route::prefix('product_codes')->group(function () {
    //nối route với controller
    Route::get('/', [ProductCodeController::class, 'index'])->name('product_codes.index');
    Route::get('/create', [ProductCodeController::class, 'create'])->name('product_codes.create');
    Route::post('/', [ProductCodeController::class, 'store'])->name('product_codes.store');
    Route::get('/{id}', [ProductCodeController::class, 'show'])->name('product_codes.show');
    Route::get('/{id}/edit', [ProductCodeController::class, 'edit'])->name('product_codes.edit');
    Route::put('/{id}', [ProductCodeController::class, 'update'])->name('product_codes.update');
    Route::delete('/{id}', [ProductCodeController::class, 'destroy'])->name('product_codes.destroy');
});

    


Route::get('hasOne', function () {
    $item = Product::find(1); // select * from products where id = 1;
    dd($item->product_code->toArray()); // select * from product_code where product_id = 1
});

Route::get('hasOneInverse', function () {
    $item = ProductCode::find(2);
    dd($item->product->toArray()); //
});

Route::get('hasMany', function () {
});

Route::get('hasInverse', function () {
});

Route::get('manyManyProducts', function () {
});

Route::get('manyManyOrders', function () {
});
