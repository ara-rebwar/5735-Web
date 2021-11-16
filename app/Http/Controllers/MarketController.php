<?php

namespace App\Http\Controllers;

use App\Models\All_Address;
use App\Models\Day;
use App\Models\discount_market;
use App\Models\MarketCategory;
use App\Models\Order;
use App\Models\User;
use Google\Cloud\Build\V1\Hash;
use Illuminate\Http\Request;
use App\Models\market;
use App\Models\media;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Type;

class MarketController extends Controller
{
    public $url = "http://localhost:8000/images";
    public function show()
    {
        $marketImages = DB::select('select media.id,url from markets inner join media on markets.image  = media.id ');
        $data['category'] = Category::all();
        $data['type'] = Type::all();
        $data['address']=DB::select('select * from all__addresses');
        return view('markets', compact('data','marketImages'));
    }
    public function insert(Request $request)
    {
        $request->validate([
            'marketName' => 'required|string',
            'marketAddress' => 'required',
            'marketPhone' => 'required|numeric',
            'marketClosed' => 'required',
            'type'=>'required',
            'has_product'=>'required',
        ]);
        $market = new market();
        $media = new media();
        $cats = $request->category;
        $i = 0;
        if ($request->marketPriority  == "0"){
//            $media->url = $request->marketURL;
            $file = $request->file('marketURL');
            if ($file){
                $ext = $file->getClientOriginalExtension();
                $fileName = time() . '.' . $ext;
                $file->move('images/market_image/', $fileName);
                $fileName = $this->url.'/market_image/' . $fileName;
                $media->url = $fileName;
            }
        }else{
            $media->url = $request->chosenImageMarket;
        }
        $media->save();
        $iconMedia = new media();
        if ($request->iconPriority  == "0"){
            if ($request->hasFile('marketIconImage')){
                $file = $request->file('marketIconImage');
                $ext = $file->getClientOriginalExtension();
                $fileName = time() . '.' . $ext;
                $file->move('images/icons/', $fileName);
                $fileName = $this->url.'/icons/' . $fileName;
                $iconMedia->url = $fileName;
            }
        }else{
            $iconMedia->url = $request->chosenImageIcon;
        }
        $iconMedia->save();
        $market->name = $request->marketName;
        $market->image = $media->id;
        $market->address = $request->marketAddress;
        $market->mobile1 = $request->marketPhone;
        $market->mobile2 = $request->marketPhone2;
        $market->closed = (int)$request->marketClosed;
        $market->type = $request->type;
        if ($request->has_product == 1){
            $market->has_product =1;
        }else{
            $market->has_product=0;
        }
        $market->MSSQL_ID=0;
        $market->icon=$iconMedia->id;
        $market->save();
        $has_product=Type::find($request->type);
            while ($i < count($cats)) {
                $mc = new MarketCategory();
                $mc->market_id = $market->id;
                $mc->category_id = $cats[$i];
                $mc->save();
                $i++;
            }
        return redirect(route('showMarket'))->with('marketSuccessMsg', 'information inserted');
    }
    public function selectmarketId($id)
    {
        $data = DB::select("select *,markets.id as id from markets inner join media on markets.image=media.id and markets.id = ? ", [$id]);
        $media = DB::select("select media.id, media.url from markets inner join media on markets.image = media.id and markets.id = ?",[$id]);
        $data[0]->image = $media[0];
        return response()->json($data);
    }
    public function selectAll()
    {
        $data = DB::select("select * from markets ");
        for ($a = 0; $a < count($data); $a++) {
            $data[$a]->image = media::find($data[$a]->image);
            $data[$a]->discount = DB::select('select start_time,end_time,discount_markets.created_at,discount_markets.updated_at,day,type_name,rate from discount_markets inner join days on discount_markets.day_of_week  = days.id  inner join discount_types on discount_types.id = discount_markets.discount_id where  discount_markets.created_at IN  (select max(created_at) from discount_markets where discount_markets.market_id = ? ) ',[$data[$a]->id]);
        }
        return response()->json($data);
    }
    public function fetchAllData($id)
    {
        $data = DB::select('select * from products where market = ? ', [$id]);
        $a = 0;
        while ($a < count($data)) {
            $data[$a]->image = media::find($data[$a]->image);
            $a++;
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
        $marketImages = DB::select('select media.id,url from markets inner join media on markets.image  = media.id ');
        $data['category'] = DB::select('select * from categories');
        $data['type'] = Type::all();
        $data['address']=All_Address::all();
        $data['icon']=DB::select('select * from markets inner join media on media.id = markets.icon and markets.id = ? ',[$id]);
        $data['categories']=DB::select('select * from market_categories where market_id = ? ',[$id]);
        $data['marketInfo']= DB::select('select *,markets.name as marketName,markets.id as marketId,media.id as imageId from markets inner join media on media.id = markets.image  inner join market_categories on markets.id = market_categories.market_id and markets.id= ?  ',[$id]);
        return view('editMarket', compact('data','marketImages'));
    }
    public function updateMarket(Request $request, $id)
    {
        $request->validate([
            'marketName' => 'required|string',
            'marketAddress' => 'required',
            'marketMobile1' => 'required|numeric',
            'marketClosed' => 'required',
            'type'=>'required',
            'has_product'=>'required',
        ]);
            $media = media::find($request->mediaId);
            if ($request->marketPriority == 0){
                $file = $request->file('marketURL');
                if ($file){
                    $ext = $file->getClientOriginalExtension();
                    $fileName = time() . '.' . $ext;
                    $file->move('images/market_image/', $fileName);
                    $fileName =$this->url.'/market_image/' . $fileName;
                    $media->url = $fileName;
                }

            }else{
                $media->url = $request->chosenImageMarket;
            }
        $media->save();
        $mediaIcon =media::find($request->IconImageId);
            if ($request->iconPriority == 0){

                $file = $request->file('marketIconImage');
                if ($file){
                    $ext = $file->getClientOriginalExtension();
                    $fileName = time() . '.' . $ext;
                    $file->move('images/icons/', $fileName);
                    $fileName =$this->url.'/icons/' . $fileName;
                    $mediaIcon->url = $fileName;
                }
            }else{
                $mediaIcon->url = $request->chosenImageIcon;
            }
        $mediaIcon->save();

        $market = market::find($request->marketId);
        $market->name = $request->marketName;
        $market->address = $request->marketAddress;
        $market->mobile1 = $request->marketMobile1;
        $market->mobile2 = $request->marketPhone2;
        $market->closed = $request->marketClosed;
        $market->type=$request->type;
        if ($request->has_product == 1){
            $market->has_product=$request->has_product;
        }else{
            $market->has_product=$request->has_product;
        }
        $market->MSSQL_ID=0;
        $market->save();
        $cats=$request->category;
        $i=0;
        DB::delete("delete from market_categories where market_id = ? ",[$request->marketId]);
        while ($i < count($cats)) {
            $mc =new MarketCategory();
            $mc->market_id = $market->id;
            $mc->category_id = $cats[$i];
            $mc->save();
            $i++;
        }
        return redirect(route('showEditMarketID', $request->marketId))->with('updateMarketMsg', 'Information Updated Successfully');
    }
    public function delete(Request $request)
    {
        DB::delete('delete from products where market = ? ',[(int)$request->marketId]);
        DB::delete('delete from discount_markets where market_id = ? ',[(int)$request->marketId]);
        DB::delete('delete from market_categories where market_id = ? ',[(int)$request->marketId]);
        DB::delete('delete from slides where market = ? ',[(int)$request->marketId]);
        DB::delete('delete from markets where id  = ? ',[(int)$request->marketId]);
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
    public function UpdateIsBy5735(Request $request){
        $id=$request->id;
        $is=$request->is;
        $data=market::find($id);
        if ($data){
            if ($is == "yes"){
                $data->is_by_5735=1;
            }else{
                $data->is_by_5735=0;
            }
        }
        $data->save();
        return "updated";
    }
    public function  showDiscount($id){
        $days= Day::all();
        $products=DB::select('select id,products.name  from  products where products.market = ? ',[$id]);
        $market_id=$id;
        $discountList=DB::select('select *,discount_markets.id as id from discount_markets inner join discount_types  on discount_markets.discount_id = discount_types.id inner join markets on markets.id = discount_markets.market_id inner join days on days.id =  discount_markets.day_of_week and discount_markets.market_id = ? ',[$id]);
        return view('discount',compact(['days','products','market_id','discountList']));
    }
    public function second(){
        if (DB::connection('mysql2')->table('user')->insert([["id"=>1,"name"=>"aa"]]))
            dd("success");
    }
    public function showMarketProductsID($id){
        $marketImages = DB::select('select media.id,url from markets inner join media on markets.image  = media.id ');
        $categories  = DB::select('select * from market_categories inner join categories on market_categories.category_id = categories.id and market_categories.market_id = ? ',[$id]);
        return view('products',compact('categories','id','marketImages'));
    }
    public function test(Request $request){
        $order = new Order();
        $order->user =$request->user;
        $order->market = $request->market;
        $order->products=$request->products;
        $order->from = $request->from;
        $order->to = $request->to;
        $order->delivery_price=$request->delivery_price;
        $order->product_price = $request->product_price;
        $order->save();
        $serverName = "WIN-PQQFGC147DA";
        $uid = "kurdity";
        $pwd = "5735kurdity2020";
        $databaseName = "TestDB";
        $connectionInfo = array( "UID"=>$uid,
            "PWD"=>$pwd,
            "Database"=>$databaseName);
        /* Connect using SQL Server Authentication. */
        $conn = sqlsrv_connect( $serverName, $connectionInfo);
    }

    public function checkPassword(Request $request){
        $user = User::find($request->userId);

        if (\Illuminate\Support\Facades\Hash::check($request->checkPassword,$user->password)){
            return 1;
        }
        return 0;
    }
}
