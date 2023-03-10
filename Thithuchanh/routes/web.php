<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BooksController;
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
Route::prefix('books')->group(function () {

    Route::get('/', [BooksController::class, 'index'])->name('books.index');
    Route::get('/create', [BooksController::class, 'create'])->name('books.create');
    Route::post('/', [BooksController::class, 'store'])->name('books.store');
    Route::get('/{id}/edit', [BooksController::class, 'edit'])->name('books.edit');
    Route::put('/{id}', [BooksController::class, 'update'])->name('books.update');
    Route::delete('{id}', [BooksController::class, 'destroy'])->name('books.destroy');
    Route::get('/excel', [BooksController::class, 'excel'])->name('books.excel');

});
