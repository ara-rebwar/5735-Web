<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Type;
use Illuminate\Http\Request;
use App\Models\product;
use App\Models\market;
use App\Models\media;
use Illuminate\Support\Facades\DB;
class ProductController extends Controller
{
    public $url = "http://localhost:8000/images";
  public function insert(Request $request){
      $request->validate([
          'productName'=>'required|string',
          'productPrice'=>'required|numeric',
          'productDescription'=>'required|string',
          'productIngredients'=>'required|string',

          'category'=>'required'
      ]);
      $product = new product();
      $media =new media();
      if ($request->productPriority == "0"){
          $file=$request->file('productURL');
          if ($file){
              $ext=$file->getClientOriginalExtension();
              $fileName=time().'.'.$ext;
              $file->move('images/product_image/',$fileName);
              $fileName=$this->url.'/product_image/'.$fileName;
              $media->url=$fileName;

          }
      }else{
          $media->url = $request->chosenImageProduct;
      }
      $media->save();

      $product->name=$request->productName;
      $product->price=$request->productPrice;
      $product->image=$media->id;
      $product->description=$request->productDescription;
      $product->ingredients=$request->productIngredients;
      $product->market=(int)$request->marketID;
      $product->category=(int)$request->category;
      $product->save();
      return redirect(route('showMarketProductByID',$request->marketID))->with('successProductMsg','product inserted successfully');
  }
  public function showProductList(){
      $productList=DB::select('select *,products.id as productId,products.name as productName,media.id as mediaId from products inner join markets on markets.id=market inner join media on media.id = products.image');
      return view('productList',compact('productList'));
  }
  public function showEditProduct($id){
      $marketImages = DB::select('select media.id,url from markets inner join media on markets.image  = media.id ');
      $data['markets']=market::all();
      $data['product']=DB::select('select *,products.id as productId,products.name as productName,media.id as imageId from products inner join media on products.image=media.id inner join  markets on markets.id=products.market  and products.id = ? ' ,[$id]);
      $categories = DB::select('select * from market_categories inner join categories on market_categories.category_id = categories.id and market_categories.market_id = ? ',[$data['product'][0]->market]);
      return view('editProduct',compact('data','marketImages','categories'));
  }
  public function updateProductId(Request $request){
      $request->validate([
          'productName'=>'required|string',
          'productPrice'=>'required|numeric',
          'productDescription'=>'required|string',
          'productIngredients'=>'required|string',
          'productMarket'=>'required',
      ]);
      $media=media::find($request->mediaId);
      if ($request->productPriority == "0"){
          $file=$request->file('productURL');
          if ($file){
              $ext=$file->getClientOriginalExtension();
              $fileName=time().'.'.$ext;
              $file->move('images/product_image/',$fileName);
              $fileName=$this->url.'/product_image/'.$fileName;
              $media->url=$fileName;
          }
      }else{
          $media->url = $request->chosenImageProduct;
      }
    $media->save();
    $product=product::find($request->productId);
    $product->name=$request->productName;
    $product->price=$request->productPrice;
    $product->description=$request->productDescription;
    $product->ingredients=$request->productIngredients;
    $product->market=$request->productMarket;
    $product->save();
    return redirect(route('showEditProductID',$request->productId))->with('updateProductMsg','Information Updated Successfully');
  }

  public function delete(Request $request){
      $pid=$request->productId;
      $mediaId=$request->mediaId;
      $product=product::destroy($pid);
      $media=media::destroy($mediaId);
      return redirect(route('showProductByMarketId',$request->marketId))->with('deleteProductMsg','Product Deleted Successfully');
  }

  public function showMarketCategory($id){
      $id=$_GET['data'];
      $cats=DB::select('select * from market_categories inner join categories on categories.id=market_categories.category_id and market_categories.market_id= ? ',[$id]);
      return json_encode($cats);
  }
  public function showProductByMarketId($id){
  $productList = DB::select('select *,products.id as productId ,products.name as productName from products inner join categories on categories.id = products.category   inner join markets on markets.id = products.market and products.market = ?',[$id]);
  return view('productList',compact('productList','id'));
  }
  public function showAddProduct($id){
      $marketImages = DB::select('select media.id,url from markets inner join media on markets.image  = media.id ');
      $categories  =  Category::all();
      return view('products',compact('id','categories','marketImages'));
  }
}
