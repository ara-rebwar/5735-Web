<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MarketController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\CategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/index',[CustomerController::class,'insert']);
Route::post('/Code',[CustomerController::class,'sendRandomCode']);
Route::get('/markets',[MarketController::class,'selectAll']);
Route::get('/markets/{id}',[MarketController::class,'selectmarketId']);
Route::get('/productsfrommarket/{id}',[MarketController::class,'fetchAllData']);
Route::get('/Customer/{id}',[CustomerController::class,'selectAll']);
Route::get('/slide',[SlideController::class,'selectAll']);
Route::get('/slide/{id}',[SlideController::class,'selectSlideById']);
Route::post('/opened',[MarketController::class,'updateClosed']);
Route::post('/user',[AccountController::class,'authenticate']);
Route::post('/type',[TypeController::class,'selectTypeId']);
Route::post('/types',[TypeController::class,'selectAllApi']);
Route::post('/category',[CategoryController::class,'selectCategoryId']);
Route::post('/categories',[CategoryController::class,'selectAllApi']);
