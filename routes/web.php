<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MarketController;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/market',[MarketController::class,'show'])->name('showMarket');
Route::post('/market',[MarketController::class,'insert'])->name('insertMarket');

Route::get('/product',[ProductController::class,'show'])->name('showProduct');

Route::post('/product',[ProductController::class,'insert'])->name('insertProduct');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/slides',[App\Http\Controllers\SlideController::class, 'show'])->name('showSlides');
Route::get('/slides/{id}',[App\Http\Controllers\SlideController::class, 'selectProduct'])->name('showproductId');
Route::post('/slides',[App\Http\Controllers\SlideController::class, 'insert'])->name('insertSlides');
