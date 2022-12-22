<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductCodeController;
use App\Http\Controllers\User1Controller;

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
//kiểm tra shop
Route::get('/shopban', function () {
    return view('shop.layouts.main');
});
// Route::get('/shopban',[ProductController::class,'index'])->name('shopban');

//tìm kiếm admin
Route::get('/search', [ProductController::class, 'search'])->name('products.search');


Route::prefix('admin')->group(function () {
    //đăng kí
    Route::get('/register',[LoginController::class,'formregister'])->name('formregister');
    Route::post('/adminregister',[LoginController::class,'register'])->name('admin.register');
    //đăng nhập
    Route::get('/login',[LoginController::class,'formlogin'])->name('formlogin');
    Route::post('/adminlogin',[LoginController::class,'login'])->name('admin.login');
    //đăng xuất
    Route::get('/logout',[LoginController::class,'logout'])->name('logout');
});


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
    Route::put('/softdeletes/{id}', [ProductController::class, 'softdeletes'])->name('products.softdeletes');
    Route::get('/trash', [ProductController::class, 'trash'])->name('products.trash');
    Route::put('/restoredelete/{id}', [ProductController::class, 'restoredelete'])->name('products.restoredelete');
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
    Route::put('/softdeletes/{id}', [CategoryController::class, 'softdeletes'])->name('categories.softdeletes');
    Route::get('/trash', [CategoryController::class, 'trash'])->name('categories.trash');
    Route::put('/restoredelete/{id}', [CategoryController::class, 'restoredelete'])->name('categories.restoredelete');
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
    Route::put('/softdeletes/{id}', [OrderController::class, 'softdeletes'])->name('orders.softdeletes');
    Route::get('/trash', [OrderController::class, 'trash'])->name('orders.trash');
    Route::put('/restoredelete/{id}', [OrderController::class, 'restoredelete'])->name('orders.restoredelete');
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
    Route::put('/softdeletes/{id}', [ProductCodeController::class, 'softdeletes'])->name('product_codes.softdeletes');
    Route::get('/trash', [ProductCodeController::class, 'trash'])->name('product_codes.trash');
    Route::put('/restoredelete/{id}', [ProductCodeController::class, 'restoredelete'])->name('product_codes.restoredelete');
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
    $item = Category::find(1);
    dd($item->product->toArray());
});

Route::get('hasInverse', function () {
    $item = Product::find(1);
    dd($item->category->toArray());
});

Route::get('manyManyProducts', function () {
});

Route::get('manyManyOrders', function () {
});







//phân quyền
Route::get('/user1', [User1Controller::class, 'index'])->name('user1.index');
