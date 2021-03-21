<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\market;
use App\Models\media;
use Illuminate\Support\Facades\DB;
class MarketController extends Controller
{
  public function show(){
    return view('markets');
  }
//  public function show1(){
//
//      return view('market');
//  }
  public function insert(Request $request){

      $request->validate([
         'marketName' =>'required|string',
         'marketRate' =>'required|numeric',
         'marketAddress' =>'required|string',
         'marketDescription' =>'required|string',
         'marketPhone' =>'required|numeric|min:11|max:11',
         'marketMobile' =>'required|numeric|min:11|max:11',
         'marketInformation' =>'required|string',
         'marketDeliveryFee' =>'required|numeric',
         'marketAdminCommission' =>'required|numeric',
         'marketDefaultTax' =>'required|numeric',
         'marketLatitude' =>'required|numeric',
         'marketLongitude' =>'required|numeric',
         'marketClosed' =>'required',
         'marketAvailableForDelivery' =>'required',
         'marketDeliveryRange' =>'required|numeric',
         'marketImageName' =>'required|string',
         'marketDistance' =>'required|numeric',
         'marketURL' =>'required',
         'marketThumb' =>'required|string',
         'marketimageSize' =>'required|numeric',
         'marketIcon' =>'required'
      ]);
    $market=new market();
    $media =new media();
    $media->name=$request->marketImageName;
    $media->url=$request->marketURL;
    $media->thumb=$request->marketThumb;
    $media->size=$request->marketimageSize;
    $media->icon=$request->marketIcon;

    $file=$request->file('marketURL');
    $ext=$file->getClientOriginalExtension();
    $fileName=time().'.'.$ext;
    $file->move('images/market_image/',$fileName);
    $fileName='http://phplaravel-559223-1799886.cloudwaysapps.com/images/market_image/'.$fileName;
    $media->url=$fileName;


    $media->save();
    $mediaID=DB::select('select id from media where name = ?  and thumb = ? and icon = ? and size = ?   ',[$request->marketImageName,$request->marketThumb,$request->marketIcon,$request->marketimageSize]);
    $market->name=$request->marketName;
    $market->image=$mediaID[0]->id;
    $market->rate=$request->marketRate;
    $market->address=$request->marketAddress;
    $market->description=$request->marketDescription;
    $market->phone=$request->marketPhone;
    $market->mobile=$request->marketMobile;
    $market->information=$request->marketInformation;
    $market->deliveryFee=$request->marketDeliveryFee;
    $market->adminCommission=$request->marketAdminCommission;
    $market->defaultTax=$request->marketDefaultTax;
    $market->latitude=$request->marketLatitude;
    $market->longitude=$request->marketLongitude;
    $market->closed=(int) $request->marketClosed;
    $market->availableForDelivery=(int) $request->marketAvailableForDelivery;
    $market->deliveryRange=$request->marketDeliveryRange;
    $market->distance=$request->marketDistance;
    $market->save();
    return redirect(route('showMarket'))->with('marketSuccessMsg','information inserted');
  }
  public function selectAll(){
    $data=DB::select("select markets.id,markets.name,image,rate,address,description,phone,mobile,information,deliveryFee,adminCommission,defaultTax,latitude,longitude,closed,availableForDelivery,deliveryRange,distance from markets inner join media on markets.image=media.id");
    $media=DB::select("select media.id, media.url,media.thumb,media.icon,media.size from markets inner join media on markets.id = media.id");
    for ($a=0;$a<count($data);$a++){
        $data[$a]->image=$media[$a];
    }
    return response()->json($data);
  }
  public function fetchAllData($id){
    $data=DB::select("select products.id,products.name,price,discountPrice,image,products.description,ingredients,capacity,unit,packageItemsCount,featured,deliverable,market,products.created_at,products.updated_at from products inner join media on media.id=products.image and products.market= ? ",[$id]);
    $media=DB::select("select media.id,media.url,media.thumb,media.size,media.icon from products inner join media on media.id=products.image and products.market = ?  ",[$id]);
    for ($a=0;$a<count($data);$a++){
        $data[$a]->image=$media[$a];
    }
    return response()->json($data);
  }

  public function showMarketList(){
      $marketList=DB::select('select *,media.id as mediaId from markets inner join media on media.id=markets.image');
      return view('marketList',compact('marketList'));
  }

  public function ShowEditMarket($id){
      $marketInfo=DB::select('select *,markets.name as marketName,markets.id as marketId,media.id as imageId from markets inner join media on media.id = markets.image and markets.id= ?  ',[$id]);
      return view('editMarket',compact('marketInfo'));
  }



  public function updateMarket(Request $request,$id){

      $request->validate([
          'marketName' =>'required|string',
          'marketRate' =>'required|numeric',
          'marketAddress' =>'required|string',
          'marketDescription' =>'required|string',
          'marketPhone' =>'required|numeric|min:11|max:11',
          'marketMobile' =>'required|numeric|min:11|max:11',
          'marketInformation' =>'required|string',
          'marketDeliveryFee' =>'required|numeric',
          'marketAdminCommission' =>'required|numeric',
          'marketDefaultTax' =>'required|numeric',
          'marketLatitude' =>'required|numeric',
          'marketLongitude' =>'required|numeric',
          'marketClosed' =>'required',
          'marketAvailableForDelivery' =>'required',
          'marketDeliveryRange' =>'required|numeric',
          'marketImageName' =>'required|string',
          'marketDistance' =>'required|numeric',
          'marketURL' =>'required',
          'marketThumb' =>'required|string',
          'marketimageSize' =>'required|numeric',
          'marketIcon' =>'required'
      ]);

      $media =media::find($request->mediaId);


      $media->name=$request->marketImageName;
      $media->thumb=$request->marketThumb;
      $media->icon=$request->marketIcon;
      $media->size=$request->marketimageSize;




      $file=$request->file('marketURL');
      $ext=$file->getClientOriginalExtension();
      $fileName=time().'.'.$ext;
      $file->move('images/market_image/',$fileName);
      $fileName='http://phplaravel-559223-1799886.cloudwaysapps.com/images/market_image/'.$fileName;
      $media->url=$fileName;
      $media->save();
      $market=market::find($request->marketId);

      $market->name=$request->marketName;
      $market->rate=$request->marketRate;
      $market->address=$request->marketAddress;
      $market->description=$request->marketDescription;
      $market->phone=$request->marketPhone;
      $market->mobile=$request->marketMobile;
      $market->information=$request->marketInformation;
      $market->deliveryFee=$request->marketDeliveryFee;
      $market->adminCommission=$request->marketAdminCommission;
      $market->defaultTax=$request->marketDefaultTax;
      $market->latitude=$request->marketLatitude;
      $market->longitude=$request->marketLongitude;
      $market->closed=$request->marketClosed;
      $market->availableForDelivery=$request->marketAvailableForDelivery;
      $market->deliveryRange=$request->marketDeliveryRange;
      $market->distance=$request->marketDistance;

      $market->save();




      return redirect(route('showEditMarketID',$request->marketId))->with('updateMarketMsg','Information Updated Successfully');




  }

  public function delete(Request $request){
//      $marketId=$request->marketId;
//      $mediaId=$request->mediaId;
//
////      $product=DB::delete('delete from products where products.market = ? ',[$marketId]);
//      $slideImage=DB::select('select media from slides where slides.market = ? ',[$marketId]);
//      $a=0;
//      while($a<count($slideImage)){
//
//          DB::delete('delete from media where media.id =  ? ',[$slideImage[$a]->media]);
//      }
//
//
//
////
////    $productImage=DB::select('select image from products where products.market = ? ',[$marketId]);
////    DB::delete('delete from products where products.market = ? ',[$marketId]);
////    $media=DB::delete('delete from media where media.id = ? ',[$productImage]);
////
////
////
////    DB::delete('delete from markets where id = ? ',[$marketId]);
////    DB::delete('delete from media where id = ? ',[$marketMediaId]);
//
//    return redirect(route('showMarketList'))->with('deleteMarketMsg','Market Deleted Successfully');






  }
}
