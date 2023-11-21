<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Categories routes
Route::resource('categories', CategoryController::class);
Route::delete('categories/{category}/delete', 'App\Http\Controllers\CategoryController@destroy');

// Products routes
Route::resource('products', ProductController::class);
