<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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


// Route::prefix('admin')->group(function () {
//     Route::get('/create', [ProductController::class, 'create'])->name('admin.create');
//     Route::post('/', [ProductController::class, 'store'])->name('admin.store');

// });


// Route::get('link_vip/{age}',function($age){
//     echo 'Trang Link Vip';
// })->middleware('checkage');

// Route::get('link_normal',function(){
//     echo 'Trang Link Binh Thuong';
// });


// Route::get('hasOne',function(){
//     $item = Product::find(1);//select * from products where id = 1
//     dd($item->product_code);//select * from product_codes where product_id = 1
// });

// Route::get('hasOneInverse',function(){
//     $item = ProductCode::find(1);
//     dd($item->product);
// });

// Route::get('hasMany',function(){
//     $item = Category::find(1);
//     dd($item->products->toArray());
// });

// Route::get('hasInverse',function(){
//     $item = Product::find(2);
//     dd($item->category->toArray());
// });

// Route::get('manyManyProducts',function(){
//     $item = Product::find(1);
//     dd($item->orders->toArray());
// });

// Route::get('manyManyOrders',function(){
//     $item = Order::find(1);
//     dd($item->products->toArray());
// });
Route::get('xoa_san_pham/{product_id}', function ($product_id ,Request $request) {
       //lấy giỏ hàng cũ , nếu ko có giá trị thì đặt mảng rỗng 
       $cart = $request->session()->get('cart', []);
    //xóa phần tử trong mảng dựa theo chỉ số 
    if( isset($cart[$product_id])){
        unset($cart[$product_id]);
    }
      //lưu session
    $request->session()->put('cart', $cart);

    //chuyển hướng sang trang giỏ hàng 
    return redirect('/gio_hang');
});
//http://127.0.0.1:8000/xoa_san_pham/11


Route::get('them_gio_hang/{product_id}/{qty}', function ($product_id, $qty, Request $request) {

    //lấy giỏ hàng cũ , nếu ko có giá trị thì đặt mảng rỗng 
    $cart = $request->session()->get('cart', []);

    //thêm phần tử vào mảng , vs chỉ số product_id  và giá trị qty
    if (isset($cart[$product_id])) {
        //nếu tồn tại thì cộng thêm đơn 
        $cart[$product_id] = $cart[$product_id] + $qty;
    } else {

        $cart[$product_id] = $qty;
    }

    //lưu session
    $request->session()->put('cart', $cart);

    //chuyển hướng sang trang giỏ hàng 
    return redirect('/gio_hang');
});
//http://127.0.0.1:8000/them_gio_hang/10/1


Route::get('gio_hang', function (Request $request) {
    //lấy session
    $cart = $request->session()->get('cart');

    //lấy id sản phẩm từ mảng 
    $product_id = array_keys($cart);
    
    echo '<pre>';
    print_r($cart);
    print_r($product_id);
    echo '</pre>';
});
//http://127.0.0.1:8000/gio_hang
