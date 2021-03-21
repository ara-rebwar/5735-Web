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
      $request->validate([
          'productName'=>'required|string',
          'productPrice'=>'required|numeric',
          'productDiscountPrice'=>'required|numeric',
          'productDescription'=>'required|string',
          'productIngredients'=>'required|string',
          'productCapacity'=>'required|numeric',
          'productUnit'=>'required|numeric',
          'productPackageItemsCount'=>'required|numeric',
          'productFeatured'=>'required',
          'productDeliverable'=>'required',
          'productMarket'=>'required',
          'productImageName'=>'required|string',
          'productThumb'=>'required|string',
          'productIcon'=>'required|string',
          'productimageSize'=>'required|string',
          'productURL'=>'required'
      ]);
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
      $fileName='http://phplaravel-559223-1799886.cloudwaysapps.com/images/product_image/'.$fileName;
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



  public function showProductList(){
      $productList=DB::select('select *,products.id as productId,products.name as productName,media.id as mediaId from products inner join markets on markets.id=market inner join media on media.id = products.image');
      return view('productList',compact('productList'));
  }

  public function showEditProduct($id){
      $data['markets']=market::all();
      $data['product']=DB::select('select *,products.id as productId,products.name as productName,media.name as imageName,media.id as imageId from products inner join media on products.image=media.id inner join  markets on markets.id=products.market  and products.id = ? ' ,[$id]);
        return view('editProduct',compact('data'));
  }

  public function updateProductId(Request $request,$id){

      $request->validate([
          'productName'=>'required|string',
          'productPrice'=>'required|numeric',
          'productDiscountPrice'=>'required|numeric',
          'productDescription'=>'required|string',
          'productIngredients'=>'required|string',
          'productCapacity'=>'required|numeric',
          'productUnit'=>'required|numeric',
          'productPackageItemsCount'=>'required|numeric',
          'productFeatured'=>'required',
          'productDeliverable'=>'required',
          'productMarket'=>'required',
          'productImageName'=>'required|string',
          'productThumb'=>'required|string',
          'productIcon'=>'required|string',
          'productimageSize'=>'required|string',
          'productURL'=>'required'
      ]);

      $media=media::find($request->mediaId);
      $media->name=$request->productImageName;
      $media->thumb=$request->productThumb;
      $media->icon=$request->productIcon;
      $media->size=$request->productimageSize;

      $file=$request->file('productURL');
      $ext=$file->getClientOriginalExtension();
      $fileName=time().'.'.$ext;
      $file->move('images/product_image/',$fileName);
      $fileName='http://phplaravel-559223-1799886.cloudwaysapps.com/images/product_image/'.$fileName;
      $media->url=$fileName;

      $media->save();



    $product=product::find($id);
    $product->name=$request->productName;
    $product->price=$request->productPrice;
    $product->discountPrice=$request->productDiscountPrice;
    $product->description=$request->productDescription;
    $product->ingredients=$request->productIngredients;
    $product->packageItemsCount=$request->productPackageItemsCount;
    $product->capacity=$request->productCapacity;
    $product->unit=$request->productUnit;
    $product->featured=$request->productFeatured;
    $product->deliverable=$request->productDeliverable;
    $product->market=$request->productMarket;
    $product->save();

    return redirect(route('showEditProductID',$id))->with('updateProductMsg','Information Updated Successfully');


  }

  public function delete(Request $request){
      $pid=$request->productId;
      $mediaId=$request->mediaId;
      $product=product::destroy($pid);
      $media=media::destroy($mediaId);
      return redirect(route('showProductList'))->with('deleteProductMsg','Product Deleted Successfully');
  }
}
