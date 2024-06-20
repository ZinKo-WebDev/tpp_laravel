<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ArticleController;

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;

Route::get("/", function () {
    return view("welcome");
});

Route::middleware('auth')->group(function () {

Route::get("category", [CategoryController::class, 'index'])->name('categoryIndex');
Route::get('category/create', [CategoryController::class, 'create'])->name('categoryCreate');
Route::post('category/store', [CategoryController::class, 'store'])->name('categoryStore');
Route::get('category/{id}', [CategoryController::class, 'edit'])->name('categoryEdit');
Route::post('category/update/{id}', [CategoryController::class, 'update'])->name('categoryUpdate');
Route::post('category/delete/{id}', [CategoryController::class, 'delete'])->name('categoryDelete');


Route::get('product', [ProductController::class,'index'])->name('productIndex');
Route::get('/product/create', [ProductController::class,'create'])->name('productCreate');
Route::post('/product/store', [ProductController::class,'store'])->name('productStore');
Route::get('/product/{id}', [ProductController::class,'edit'])->name('productEdit');
Route::post('/product/update/{id}', [ProductController::class,'update'])->name('productUpdate');
Route::post('/product/{productdel}', [ProductController::class,'destroy'])->name('productDelete');

Route::resource('Article', ArticleController::class);


});// ---End of middleware group function---


Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
