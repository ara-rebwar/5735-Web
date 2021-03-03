<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\market;
use App\Models\media;
use Illuminate\Support\Facades\DB;
class MarketController extends Controller
{
  public function show(){
    return view('market');
  }
  public function insert(Request $request){
    $market=new market();
    $media =new media();
    $media->name=$request->marketImageName;
    $media->url=$request->marketURL;
    $media->thumb=$request->marketThumb;
    $media->size=$request->marketimageSize;
    $media->icon=$request->marketIcon;
    $media->save();
    $mediaID=DB::select('select id from media where name = ? and url = ?  ',[$request->marketImageName,$request->marketURL]);
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
}
