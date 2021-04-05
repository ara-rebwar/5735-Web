<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\market;
use App\Models\media;
use Illuminate\Support\Facades\DB;
use App\Models\MC;
use App\Models\Category;
use App\Models\Type;

class MarketController extends Controller
{

    public function show()
    {
        $data['category'] = Category::all();
        $data['type'] = Type::all();
        return view('markets', compact('data'));
    }

    public function insert(Request $request)
    {

        $request->validate([
            'marketName' => 'required|string',
            'marketRate' => 'required|numeric',
            'marketAddress' => 'required|string',
            'marketDescription' => 'required|string',
            'marketPhone' => 'required|numeric',
            'marketInformation' => 'required|string',
            'marketClosed' => 'required',
            'marketImageName' => 'required|string',
            'marketURL' => 'required',
            'marketThumb' => 'required|string',
            'marketimageSize' => 'required|numeric',
            'marketIcon' => 'required',
            'type'=>'required'
        ]);
        $market = new market();
        $media = new media();

        $mc = new MC();
        $i = 0;
        $mcId = count($mc::all());
        $cats = $request->category;


        $media->name = $request->marketImageName;
        $media->url = $request->marketURL;
        $media->thumb = $request->marketThumb;
        $media->size = $request->marketimageSize;
        $media->icon = $request->marketIcon;

        $file = $request->file('marketURL');
        $ext = $file->getClientOriginalExtension();
        $fileName = time() . '.' . $ext;
        $file->move('images/market_image/', $fileName);
        $fileName = 'http://phplaravel-559223-1799886.cloudwaysapps.com/images/market_image/' . $fileName;
        $media->url = $fileName;


        $media->save();
        $mediaID = DB::select('select id from media where name = ?  and thumb = ? and icon = ? and size = ?   ', [$request->marketImageName, $request->marketThumb, $request->marketIcon, $request->marketimageSize]);
        $market->name = $request->marketName;
        $market->image = $mediaID[0]->id;
        $market->rate = $request->marketRate;
        $market->address = $request->marketAddress;
        $market->description = $request->marketDescription;
        $market->phone = $request->marketPhone;
        $market->mobile = "hi";
        $market->information = $request->marketInformation;
        $market->deliveryFee = -1;
        $market->adminCommission = -1;
        $market->defaultTax = -1;
        $market->latitude = -1;
        $market->longitude = -1;
        $market->closed = (int)$request->marketClosed;
        $market->availableForDelivery = 0;
        $market->deliveryRange = -1;
        $market->distance = -1;
        $market->type = $request->type;
        $market->save();
        $has_product=Type::find($request->type);
        if ($has_product->has_product == 1){
            while ($i < count($cats)) {
                $mc = new MC();
                $mcId++;
                $mc->id = $mcId;
                $mc->mid = $market->id;
                $mc->cid = $cats[$i];
                $mc->save();
                $i++;
            }
        }
        return redirect(route('showMarket'))->with('marketSuccessMsg', 'information inserted');
    }
    public function selectmarketId($id)
    {
        $data = DB::select("select markets.id,markets.name,image,rate,address,description,phone,mobile,information,deliveryFee,adminCommission,defaultTax,latitude,longitude,closed,availableForDelivery,deliveryRange,distance,type from markets inner join media on markets.image=media.id and markets.id = ? ", [$id]);
        $media = DB::select("select media.id, media.url,media.thumb,media.icon,media.size from markets inner join media on markets.id = media.id");
        for ($a = 0; $a < count($data); $a++) {
            $data[$a]->image = $media[$a];
        }
        return response()->json($data);
    }
    public function selectAll()
    {
        $data = DB::select("select markets.id,markets.name,image,rate,address,description,phone,mobile,information,deliveryFee,adminCommission,defaultTax,latitude,longitude,closed,availableForDelivery,deliveryRange,distance,type from markets inner join media on markets.image=media.id");
        $media = DB::select("select media.id, media.url,media.thumb,media.icon,media.size from markets inner join media on markets.id = media.id");
        for ($a = 0; $a < count($data); $a++) {
            $data[$a]->image = $media[$a];
        }
        return response()->json($data);
    }

    public function fetchAllData($id)
    {
//    $data=DB::select("select *,products.image as productImage from products where id = ? ",[$id]);
//    $data[0]->image=media::find($data[0]->image);
//
//    return $data;

        $data = DB::select('select * from products where market = ? ', [$id]);
        $a = 0;
        while ($a < count($data)) {
            $data[$a]->image = media::find($data[$a]->image);
            $a++;
//            print_r('Rows: ' . $data[$a]);
//            print_r('image: ' . media::find($data[$a]->image));
        }


        return $data;

    }

    public function showMarketList()
    {
        $marketList = DB::select('select *,media.id as mediaId,markets.id as marketId from markets inner join media on media.id=markets.image');
        return view('marketList', compact('marketList'));
    }

    public function ShowEditMarket($id)
    {
        $marketInfo = DB::select('select *,markets.name as marketName,markets.id as marketId,media.id as imageId from markets inner join media on media.id = markets.image and markets.id= ?  ', [$id]);
        return view('editMarket', compact('marketInfo'));
    }


    public function updateMarket(Request $request, $id)
    {

        $request->validate([
            'marketName' => 'required|string',
            'marketRate' => 'required|numeric',
            'marketAddress' => 'required|string',
            'marketDescription' => 'required|string',
            'marketPhone' => 'required|numeric',
            'marketInformation' => 'required|string',
            'marketClosed' => 'required',
            'marketImageName' => 'required|string',
            'marketThumb' => 'required|string',
            'marketimageSize' => 'required|numeric',
            'marketIcon' => 'required'
        ]);

        $media = media::find($request->mediaId);


        $media->name = $request->marketImageName;
        $media->thumb = $request->marketThumb;
        $media->icon = $request->marketIcon;
        $media->size = $request->marketimageSize;


        $file = $request->file('marketURL');
        if ($file){
            $ext = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $ext;
            $file->move('images/market_image/', $fileName);
            $fileName = 'http://phplaravel-559223-1799886.cloudwaysapps.com/images/market_image/' . $fileName;
            $media->url = $fileName;
        }
        $media->save();
        $market = market::find($request->marketId);
        $market->name = $request->marketName;
        $market->rate = $request->marketRate;
        $market->address = $request->marketAddress;
        $market->description = $request->marketDescription;
        $market->phone = $request->marketPhone;
        $market->mobile = -1;
        $market->information = $request->marketInformation;
        $market->deliveryFee = -1;
        $market->adminCommission = -1;
        $market->defaultTax = -1;
        $market->latitude = "hi";
        $market->longitude = "hi";
        $market->closed = $request->marketClosed;
        $market->availableForDelivery = 0;
        $market->deliveryRange = -1;
        $market->distance = -1;

        $market->save();


        return redirect(route('showEditMarketID', $request->marketId))->with('updateMarketMsg', 'Information Updated Successfully');


    }

    public function delete(Request $request)
    {
        $marketId = $request->marketId;
        $mediaId = $request->mediaId;
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


        $slideMediaId = DB::select('select media from slides where market = ? ', [$marketId]);
        $s = 0;
        DB::delete('delete from slides where market = ? ', [$marketId]);
        while ($s < count($slideMediaId)) {

            DB::delete('delete from media where id = ? ', [$slideMediaId[$s]->media]);
            $s++;
        }

        $productMediaId = DB::select('select image from products where market = ? ', [$marketId]);

        $p = 0;
        DB::delete('delete from products where market = ? ', [$marketId]);
        while ($p < count($productMediaId)) {

            DB::delete('delete from media where id  = ? ', [$productMediaId[$p]->image]);
            $p++;
        }


        $marketMediaId = DB::select('select image from markets where id = ? ', [$marketId]);
        $m = 0;
        DB::delete('delete from markets where id = ? ', [$marketId]);
        while ($m < count($marketMediaId)) {
            DB::delete('delete from media where id = ? ', [$marketMediaId[$m]->image]);
            $m++;
        }
        //market
        //media
        return redirect(route('showMarketList'))->with('deleteMarketMsg', 'Market Deleted Successfully');
    }


    public function updateClosed(Request $request)
    {
        $id = $request->id;
        $closed = $request->closed;

        $market = market::find($id);
        if ($closed == "no") {
            $market->closed = 0;
        } else {
            $market->closed = 1;
        }
        $market->save();
        return "updated";
    }
}
