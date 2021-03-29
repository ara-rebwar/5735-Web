<?php

namespace App\Http\Controllers;

use App\Models\Type;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\market;
use App\Models\media;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
  public function show(){
    $data['market']=market::all();
    $data['type']=Type::all();


    return view('products',compact('data'));
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
          'productDescription'=>'required|string',
          'productIngredients'=>'required|string',
          'productMarket'=>'required',
          'productImageName'=>'required|string',
          'productThumb'=>'required|string',
          'productIcon'=>'required|string',
          'productimageSize'=>'required|string',
          'productURL'=>'required',
          'category'=>'required'
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
//    $mediaID=DB::select('select id from media where name = ? and thumb = ? and size = ? and icon = ? ',[$request->productImageName,$request->productThumb,$request->productimageSize,$request->productIcon]);

    $product->name=$request->productName;
    $product->price=$request->productPrice;
    $product->discountprice=-1;
    $product->image=$media->id;
    $product->description=$request->productDescription;
    $product->ingredients=$request->productIngredients;
    $product->capacity="hi";
    $product->unit="hi";
    $product->packageItemsCount="hi";
    $product->featured=0;
    $product->Deliverable=0;
    $product->market=(int)$request->productMarket;
    $product->category=(int)$request->category;
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
          'productDescription'=>'required|string',
          'productIngredients'=>'required|string',
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
    $product->discountPrice=-1;
    $product->description=$request->productDescription;
    $product->ingredients=$request->productIngredients;
    $product->packageItemsCount="hi";
    $product->capacity="hi";
    $product->unit="hi";
    $product->featured=0;
    $product->deliverable=0;
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


  public function showMarketCategory($id){
      $id=$_GET['data'];
      $cats=DB::select('select *,m_c_s.id as mcId from m_c_s inner join categories on categories.id=m_c_s.cid and mid= ? ',[$id]);
      return json_encode($cats);
  }
}
