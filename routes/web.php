<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MarketController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SlideController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\AllAddressController;
use App\Http\Controllers\UpdateTypeController;
use App\Http\Controllers\UpdatedDateController;
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

Route::get('firebase',[\App\Http\Controllers\FirebaseController::class,"index"])->name('showFirebase');

//--------------------------------------------Market Route-------------------------------------------------//

Route::get('/market',[MarketController::class,'show'])->name('showMarket');
Route::get('/connection',[MarketController::class,'second']);
Route::post('/market',[MarketController::class,'insert'])->name('insertMarket');
Route::get('/productMarket/{id}',[MarketController::class,'showMarketProductsID'])->name('showMarketProductByID');
Route::get('/marketList',[MarketController::class,'showMarketList'])->name('showMarketList');
Route::get('/EditMarket/{id}',[MarketController::class,'ShowEditMarket'])->name('showEditMarketID');
Route::POST('/EditMarket/{id}',[MarketController::class,'updateMarket'])->name('updateMarketID');
Route::post('/marketList',[MarketController::class,'delete'])->name('deleteMarket');
Route::get('/marketCategory',[\App\Http\Controllers\MarketCategoryController::class,'show'])->name('showMarketCategory');
Route::get('/marketCategory/{id}',[\App\Http\Controllers\MarketCategoryController::class,'showMarketCategory'])->name('showMarketCategories');
Route::post('/insertMarketCategory',[\App\Http\Controllers\MarketCategoryController::class,'insertMarketCategory'])->name('insertMarketCategory');
Route::get('/discount/{id}',[MarketController::class,'showDiscount'])->name('showDiscount');
Route::post('/discount',[\App\Http\Controllers\DiscountMarketController::class,'insertDiscount'])->name('insertDiscount');
Route::get('/discountList/{id}',[\App\Http\Controllers\DiscountMarketController::class,'showDiscountList'])->name('showDiscountList');
Route::get('/checkForimage',[\App\Http\Controllers\DiscountMarketController::class,'checkforimage']);
Route::post('/deleteDiscount',[\App\Http\Controllers\DiscountMarketController::class,'deleteDiscount'])->name('deleteDiscount');
//--------------------------------------------Product Route-------------------------------------------------//
//Route::get('/product',[ProductController::class,'show'])->name('showProduct');
Route::post('/product',[ProductController::class,'insert'])->name('insertProduct');
Route::get('/productList',[ProductController::class,'showProductList'])->name('showProductList');
Route::get('/EditProduct/{id}',[ProductController::class,'showEditProduct'])->name('showEditProductID');
Route::post('/EditProduct',[ProductController::class,'updateProductId'])->name('updateProductId');
Route::post('/productList',[ProductController::class,'delete'])->name('deleteProduct');
Route::get('/product/{id}',[ProductController::class,'showMarketCategory']);
Route::get('/Products/{id}',[ProductController::class,'showProductByMarketId'])->name('showProductByMarketId');
Route::get('/AddProduct/{id}',[ProductController::class,'showAddProduct'])->name('showAddProduct');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//--------------------------------------------Slide Route-------------------------------------------------//
Route::get('/slides',[App\Http\Controllers\SlideController::class, 'show'])->name('showSlides');
Route::get('/slideList',[SlideController::class,'showSlideList'])->name('showSlideList');
Route::get('/EditSlideId/{id}/{market}/{product}',[SlideController::class,'showEditSlideID'])->name('showEditSlideID');
Route::post('/updateSlide',[SlideController::class,'updateSlide'])->name('updateSlide');
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
Route::post('/TypeList',[\App\Http\Controllers\TypeController::class,'delete'])->name('deleteType');
Route::get('/EditType/{id}',[\App\Http\Controllers\TypeController::class,'showEditType'])->name('showEditType');
Route::post('/EditType',[\App\Http\Controllers\TypeController::class,'updateType'])->name('updateType');






//--------------------------------------------Address Route-------------------------------------------------//

Route::get('/address',[AddressController::class,'index'])->name('showAddress');
Route::post('/address',[AddressController::class,'insertAddress'])->name('insertAddress');
Route::get('/AddressList',[AddressController::class,'selectAll'])->name('showAddressList');
Route::post('/AddressList',[AddressController::class,'delete'])->name('deleteAddress');
Route::get('/EditAddress/{id}',[AddressController::class,'showEditAddress'])->name('showEditAddress');
Route::post('/EditAddress',[AddressController::class,'UpdateAddress'])->name('UpdateAddress');



//--------------------------------------------Location Route-------------------------------------------------//

// Location  =   All_Address
Route::get('/location',[AllAddressController::class,'index'])->name('showLocation');
Route::post('/location',[AllAddressController::class,'insertLocation'])->name('insertLocation');
Route::get('/locationList',[AllAddressController::class,'selectAll'])->name('showLocationList');
Route::post('locationList',[AllAddressController::class,'delete'])->name('deleteLocation');
Route::get('/EditLocation/{id}',[AllAddressController::class,'showEditLocation'])->name('showEditLocation');
Route::post('/EditLocation',[AllAddressController::class,'UpdateLocation'])->name('UpdateLocation');




//--------------------------------------------Update Type Route-------------------------------------------------//
Route::get('/updateType',[UpdateTypeController::class,'index'])->name('showUpdateType');
Route::post('/updateType',[UpdateTypeController::class,'insertUpdateType'])->name('insertUpdateType');
Route::get('/updateTypeList',[UpdateTypeController::class,'selectAll'])->name('showUpdateTypeList');
Route::post('updateTypeList',[UpdateTypeController::class,'delete'])->name('deleteUpdateType');
Route::get('/EditUpdateType/{id}',[UpdateTypeController::class,'showEditUpdateType'])->name('showEditUpdateType');
Route::post('/EditUpdateType',[UpdateTypeController::class,'UpdateUpdateType'])->name('UpdateUpdateType');






//--------------------------------------------Updated_date Route-------------------------------------------------//
Route::get('/updatedDate',[UpdatedDateController::class,'index'])->name('showUpdatedDate');
Route::post('/updateDate',[UpdatedDateController::class,'insertUpdateDate'])->name('insertUpdateDate');
Route::get('/updateDateList',[UpdatedDateController::class,'selectAll'])->name('showUpdatedDateList');
Route::post('/updateDateList',[UpdatedDateController::class,'delete'])->name('deleteUpdatedDate1');
Route::get('/EditUpdateDate/{id}',[UpdatedDateController::class,'showEditUpdatedDate'])->name('showEditUpdatedDate');
Route::post('/EditUpdateDate',[UpdatedDateController::class,'UpdateUpdateDate'])->name('UpdateUpdateDate');




