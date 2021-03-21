<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MarketController;
use App\Http\Controllers\SlideController;

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
Route::get('/markets/{id}',[MarketController::class,'fetchAllData']);
Route::get('/Customer/{id}',[CustomerController::class,'selectAll']);
Route::get('/slide',[SlideController::class,'selectAll']);
Route::get('/slide/{id}',[SlideController::class,'selectSlideById']);
