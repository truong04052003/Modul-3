<?php

use App\Http\Controllers\CaculaterController;
use App\Http\Controllers\PhotoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;

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
    return view('products.index');
});
//NHÓM ROUTE
Route::prefix('products')->group(function () {

    //nối route với controller
    Route::get('/', [ProductController::class, 'index'])->name('products.index');
    Route::get('/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/', [ProductController::class, 'store'])->name('products.store');
    Route::get('/{id}', [ProductController::class, 'show'])->name('products.show');
    Route::put('/{id}', [ProductController::class, 'update'])->name('products.update');
    Route::get('/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::delete('/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

    //TẠO ROUTE

    // Route::get('/', function () {
    //     return "lấy toàn bộ sản phẩm";
    // })->name('products.index');
    // //form thêm
    // Route::get('/create', function () {
    //     return "form thêm";
    // })->name('products.create');
    // //xử lý thêm
    // Route::post('/', function () {
    //     return "xử lý thêm";
    // })->name('products.store');
    // //xem chi tiết 
    // Route::get('/{id}', function ($id) {
    //     return "xem chi tiết sản phẩm";
    // })->name('products.show');
    // //cập nhật
    // Route::put('/{id}', function ($id) {
    //     return "cập nhật";
    // })->name('products.update');
    // //form sửa   
    // Route::get('/{id}/edit', function ($id) {
    //     return "form sửa";
    // })->name('products.edit');

    // //form xóa
    // Route::delete('/{id}', function ($id) {
    //     return "form xóa";
    // })->name('products.destroy');        ------ >>>  //ĐẶT TÊN ROUTE
});

//in ra url
Route::get('text_route', function () {
    echo '<br>' . route('products.index');
    echo '<br>' . route('products.create');
    echo '<br>' . route('products.store');

    echo '<br>' . route('products.show', 1);
    echo '<br>' . route('products.edit', 1);
    echo '<br>' . route('products.update', 1);
    echo '<br>' . route('products.destroy', 1);
});


//photos
Route::resource('photos', PhotoController::class);

Route::get('link_vip/{age}', function ($age) {
    echo "trang link vip";
})->middleware('checkage');

Route::get('Link_normal', function () {
    echo "trang link bình thg";
});

//email
Route::post('/check-email', [UserController::class, 'validationEmail'])->name('checkEmail');


//calculation
Route::get('/calculation', function () {
    return view('caculater');
});
Route::post('caculater', [CaculaterController::class, 'tinhController'])->name('caculater');
