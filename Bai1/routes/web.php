<?php

use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
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

Route::get('/', function () {
    return view('welcome');
});

//login 
Route::get('/login', function () {
    return view('login');
});
//vào trang register
Route::get('/register', function () {
    echo '<h1> trang dang ký</h1> ';
});


//xu ly login
Route::post('/xu-ly-login', function (Request  $request) {
    // dd($request->all());
    $username = $request->username;
    $password = $request->password;
    echo $username . ' - ' . $password;
    die();
});
//xu ly register
Route::post('/xu-ly-register', function () {
});


//bài tập calculator

//hiển thị form calculator
Route::get('/calculator', function () {
    return view('calculator');
});

//xu ly calculator
Route::post('/xu-ly-calculator', function (Request  $request) {
    // dd($request->all());
    // die();
    $product_description = $request->product_description;
    $list_price = $request->list_price;
    $discount_percent = $request->discount_percent;
    // echo $product_description . ' - ' . $list_price . ' - ' . $discount_percent;
    $discount_amount = $list_price * $discount_percent * 0.1;
    echo $discount_amount;
});

//bài tập 2 từ điển 
//hiện thi form từ điển 
Route::get('/dictionary', function () {
    return view('dictionary');
});

// xử lý từ điển 
Route::post('/xu-ly-dictionary', function (Request $request) {
    // dd($request->all());
    // die();

    $dictionary = $request->dictionary;
    $eng = ["hello", "goodbye", "haha"];
    $vie = ["xin chào", "tạm biệt", "anh khang tào lao"];
    foreach ( $eng as $key => $value) {
        if ($dictionary == $value) {
            $dictionary = $vie[$key];
            echo $dictionary;
            break;
        }
    }
});


//Bài 2
Route::get('hello/{name?}/{age?}',function($name='laravel',$age=0){
    return 'hello ' . $name .' '. 'age' .' ' . $age;
})->where(['name' => '[A-Za-z]+', 'age' => '[0-9]+']);



















