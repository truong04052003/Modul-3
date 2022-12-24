<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductCodeController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\UserController;

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

//shop
Route::prefix('shop')->group(function () {
    //trang chính của shop
    Route::get('/index', [ShopController::class,'index'])->name('shop.index');
    //xem chi tiết sản phẩm 
    Route::get('/showsanpham/{id}', [ShopController::class, 'show'])->name('showsanpham');
    //thêm vào giỏ hàng 
    Route::get('/cart', [ShopController::class, 'cart'])->name('shop.cart');
    Route::get('/store/{id}', [ShopController::class, 'store'])->name('shop.store');
    //cập nhật giỏ hàng
    Route::put('/update-cart', [ShopController::class, 'update'])->name('update.cart');
    //xóa khỏi giỏ hàng 
    Route::delete('/remove-from-cart/{id}',[ProductController::class,'remove'])->name('remove.from.cart');
    //thanh toán tiền 
    Route::get('/checkOuts', [ShopController::class, 'checkOuts'])->name('checkOuts');
    
});
//Logn shop 
Route::prefix('shop')->group(function () {
     //đăng kí shop
     Route::get('/register', [ShopController::class, 'register'])->name('shop.register');
     Route::post('/checkregister', [ShopController::class, 'checkregister'])->name('shop.checkregister');
    //đăng nhập shop
    Route::get('/login', [ShopController::class, 'login'])->name('shop.login');
    Route::post('/checklogin', [ShopController::class, 'checklogin'])->name('shop.checklogin');
    //đăng xuất shop
    Route::post('/shoplogout', [ShopController::class, 'logout'])->name('shoplogout');
});


//Login admin
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
//tìm kiếm admin
Route::get('/search', [ProductController::class, 'search'])->name('products.search');


//PRODUCT===========
Route::prefix('products')->group(function () {

    //nối route với controller
    Route::get('/', [ProductController::class, 'index'])->name('products.index');
    Route::get('/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/', [ProductController::class, 'store'])->name('products.store');
    Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('{id}',[ProductController::class,'destroy'])->name('products.destroy');
    //thùng rác
    Route::get('/garbagecan',[ProductController::class,'garbagecan'])->name('products.garbagecan');
    Route::get('/restore/{id}',[ProductController::class,'restore'])->name('products.restore');
    Route::get('/deleteforever/{id}',[ProductController::class,'deleteforever'])->name('products.deleteforever');
    Route::get('/{id}', [ProductController::class, 'show'])->name('products.show');
    //tìm kiếm 
    Route::post('/search', [ProductController::class,'search'])->name('products.search');
});
//CATEGORY===================
Route::prefix('categories')->group(function () {
    //nối route với controller
    Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('/', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::put('/{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    //thùng rác
    Route::get('/garbagecan',[CategoryController::class,'garbagecan'])->name('categories.garbagecan');
    Route::get('/restore/{id}',[CategoryController::class,'restore'])->name('categories.restore');
    Route::get('/deleteforever/{id}',[CategoryController::class,'deleteforever'])->name('categories.deleteforever');
    Route::get('/{id}', [CategoryController::class, 'show'])->name('categories.show');

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
     //thùng rác
     Route::get('/garbagecan',[ProductController::class,'garbagecan'])->name('products.garbagecan');
     Route::get('/restore/{id}',[ProductController::class,'restore'])->name('products.restore');
     Route::get('/deleteforever/{id}',[ProductController::class,'deleteforever'])->name('products.deleteforever');
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
Route::get('/user1', [UserController::class, 'index'])->name('user1.index');
