<?php

use Illuminate\Support\Facades\App;
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

Route::get('/{locale}', function ($locale = 'en') {
    App::setLocale($locale);
    echo __('messages.welcome');
});
// Hiển thị danh sách bài viết
Route::get('/posts', [PostController::class, 'index'])->name('posts.list');

// Hiển thị giao diện thêm mới bài viết
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');

// Tạo mới bài viết
Route::post('/posts/create', [PostController::class, 'store'])->name('posts.store');

// Chuyển đổi ngôn ngữ cho website
Route::get('change-language/{language}', [LanguageController::class, 'changeLanguage'])->name('user.change-language');




Route::get('test-lang', function () {
    //lấy session 
    $ss_locale = session()->get('lang');
    if($ss_locale){
        //thiết lập locae
        App::setLocale($ss_locale);
    }
    echo __('messages.welcome');
});

Route::get('change-lang/{locale}', function ($locale) {
    //thiết lập session
    session(['lang' => $locale]);

    //chuyển hướng 
    return redirect('/test-lang');
});

