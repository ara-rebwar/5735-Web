<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MarketController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TypeController;
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
//--------------------------------------------Market Route-------------------------------------------------//
Route::get('/market',[MarketController::class,'show'])->name('showMarket');
Route::post('/market',[MarketController::class,'insert'])->name('insertMarket');
Route::get('/marketList',[MarketController::class,'showMarketList'])->name('showMarketList');
Route::get('/EditMarket/{id}',[MarketController::class,'ShowEditMarket'])->name('showEditMarketID');
Route::POST('/EditMarket/{id}',[MarketController::class,'updateMarket'])->name('updateMarketID');
Route::post('/marketList',[MarketController::class,'delete'])->name('deleteMarket');

//--------------------------------------------Product Route-------------------------------------------------//
Route::get('/product',[ProductController::class,'show'])->name('showProduct');
Route::post('/product',[ProductController::class,'insert'])->name('insertProduct');
Route::get('/productList',[ProductController::class,'showProductList'])->name('showProductList');
Route::get('/EditProduct/{id}',[ProductController::class,'showEditProduct'])->name('showEditProductID');
Route::post('/EditProduct/{id}',[ProductController::class,'updateProductId'])->name('updateProductId');
Route::post('/productList',[ProductController::class,'delete'])->name('deleteProduct');
Route::get('/product/{id}',[ProductController::class,'showMarketCategory']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//--------------------------------------------Slide Route-------------------------------------------------//
Route::get('/slides',[App\Http\Controllers\SlideController::class, 'show'])->name('showSlides');
Route::get('/slideList',[SlideController::class,'showSlideList'])->name('showSlideList');
Route::get('/EditSlide/{id}',[SlideController::class,'showEditSlideID'])->name('showEditSlideID');
Route::post('/slideList',[SlideController::class,'delete'])->name('deleteSlide');



//--------------------------------------------Category Route-------------------------------------------------//
Route::get('/categories',[CategoryController::class,'index'])->name('showCategory');
Route::post('/categories',[CategoryController::class,'insert'])->name('insertCategory');
Route::get('/categoryList',[CategoryController::class,'selectAll'])->name('showCategoryList');
Route::get('/EditCategory/{id}',[CategoryController::class,'showEditCategory'])->name('showEditCategory');
Route::post('/EditCategory',[CategoryController::class,'update'])->name('updateCategory');
Route::post('/categoryList',[CategoryController::class,'delete'])->name('deleteCategory');





Route::get('/slides/{id}',[App\Http\Controllers\SlideController::class, 'selectProduct'])->name('showproductId');
Route::post('/slides',[App\Http\Controllers\SlideController::class, 'insert'])->name('insertSlides');








//--------------------------------------------Account Route-------------------------------------------------//
Route::get('/Accounts',[\App\Http\Controllers\AccountController::class,'index'])->name('showAccounts');
Route::post('/Accounts',[\App\Http\Controllers\AccountController::class,'insert'])->name('insertAccount');
Route::get('/AccountList',[\App\Http\Controllers\AccountController::class,'selectAll'])->name('showAccountList');
Route::post('/AccountList',[\App\Http\Controllers\AccountController::class,'delete'])->name('deleteAccount');
Route::get('/EditAccount/{id}',[\App\Http\Controllers\AccountController::class,'showEditAccount'])->name('showEditAccount');
Route::post('/EditAccount',[\App\Http\Controllers\AccountController::class,'updateAccount'])->name('updateAccount');



//--------------------------------------------Type Route-------------------------------------------------//

Route::get('/type',[TypeController::class,'index'])->name('showType');
Route::post('/type',[TypeController::class,'insertType'])->name('insertType');
Route::get('/TypeList',[\App\Http\Controllers\TypeController::class,'selectAll'])->name('showTypeList');
//Route::post('/TypeList',[\App\Http\Controllers\TypeController::class,'delete'])->name('deleteType');
Route::get('/EditType/{id}',[\App\Http\Controllers\TypeController::class,'showEditType'])->name('showEditType');
Route::post('/EditType',[\App\Http\Controllers\TypeController::class,'updateType'])->name('updateType');
















