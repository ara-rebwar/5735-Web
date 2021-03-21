<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MarketController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SlideController;
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
//market Routes
Route::get('/market',[MarketController::class,'show'])->name('showMarket');
Route::post('/market',[MarketController::class,'insert'])->name('insertMarket');
Route::get('/marketList',[MarketController::class,'showMarketList'])->name('showMarketList');
Route::get('/EditMarket/{id}',[MarketController::class,'ShowEditMarket'])->name('showEditMarketID');
Route::POST('/EditMarket/{id}',[MarketController::class,'updateMarket'])->name('updateMarketID');
Route::post('/marketList',[MarketController::class,'delete'])->name('deleteMarket');

//product Routes
Route::get('/product',[ProductController::class,'show'])->name('showProduct');
Route::post('/product',[ProductController::class,'insert'])->name('insertProduct');
Route::get('/productList',[ProductController::class,'showProductList'])->name('showProductList');
Route::get('/EditProduct/{id}',[ProductController::class,'showEditProduct'])->name('showEditProductID');
Route::post('/EditProduct/{id}',[ProductController::class,'updateProductId'])->name('updateProductId');
Route::post('/productList',[ProductController::class,'delete'])->name('deleteProduct');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Slide Routes
Route::get('/slides',[App\Http\Controllers\SlideController::class, 'show'])->name('showSlides');
Route::get('/slideList',[SlideController::class,'showSlideList'])->name('showSlideList');
Route::get('/EditSlide/{id}',[SlideController::class,'showEditSlideID'])->name('showEditSlideID');
Route::post('/slideList',[SlideController::class,'delete'])->name('deleteSlide');








Route::get('/slides/{id}',[App\Http\Controllers\SlideController::class, 'selectProduct'])->name('showproductId');
Route::post('/slides',[App\Http\Controllers\SlideController::class, 'insert'])->name('insertSlides');
