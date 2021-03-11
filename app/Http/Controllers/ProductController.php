<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\market;
use App\Models\media;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
  public function show(){
    $market=market::all();

    return view('products',compact('market'));
  }
//    public function show1(){
//        $market=market::all();
//
//        return view('products',compact('market'));
//    }
  public function insert(Request $request){
    $product = new product();
    $media =new media();

    $media->name=$request->productImageName;
    $media->thumb=$request->productThumb;
    $media->icon=$request->productIcon;
    $media->size=$request->productimageSize;

      $file=$request->file('productURL');
      $ext=$file->getClientOriginalExtension();
      $fileName=time().'.'.$ext;
      $file->move('images/product_image/',$fileName);
      $media->url=$fileName;


    $media->save();
    $mediaID=DB::select('select id from media where name = ? and thumb = ? and size = ? and icon = ? ',[$request->productImageName,$request->productThumb,$request->productimageSize,$request->productIcon]);

    $product->name=$request->productName;
    $product->price=$request->productPrice;
    $product->discountprice=$request->productDiscountPrice;
    $product->image=$mediaID[0]->id;
    $product->description=$request->productDescription;
    $product->ingredients=$request->productIngredients;
    $product->capacity=$request->productCapacity;
    $product->unit=$request->productUnit;
    $product->packageItemsCount=$request->productPackageItemsCount;
    $product->featured=(int)$request->productFeatured;
    $product->Deliverable=(int)$request->productDeliverable;
    $product->market=(int)$request->productMarket;

    $product->save();

    return redirect(route('showProduct'))->with('successProductMsg','product inserted successfully');


  }
}
