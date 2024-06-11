<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get("/",function(){
return view("index");
});

// Route::get("/category",function(){
// return view("category.index");
// });

Route::get("category",[CategoryController::class,'index']);
Route::get("result",[CategoryController::class,'result']);
Route::get("product",[ProductController::class,'index']);

