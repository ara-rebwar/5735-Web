<?php

namespace App\Http\Controllers;

use App\Models\Day;
use App\Models\discount_market;
use App\Models\discount_type;
use App\Models\DiscountDayofweek;
use App\Models\market;
use App\Models\media;
use App\Models\product_discount;
use Google\Cloud\Channel\V1\Price;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use voku\helper\ASCII;

class DiscountMarketController extends Controller
{
    public function insertDiscount(Request $request){

            $discount_type=new discount_type();
            $discount_type->type_name=$request->discount_type;
            $discount_type->rate=$request->rate;
            $discount_type->save();

            $discount_market = new discount_market();
            $discount_market->market_id= $request->market_id;
            $discount_market->discount_id= $discount_type->id;
            $discount_market->start_time= $request->start_time;
            $discount_market->end_time =  $request->end_time;
            $discount_market->save();
            foreach ($request->days as $day){
                $discount_day_of_week = new DiscountDayofweek();
                $discount_day_of_week->discount_market_id = $discount_market->id;
                $discount_day_of_week->day_id  = $day;
                $discount_day_of_week->save();
            }
        return redirect(route('showDiscount',$request->market_id))->with('success','Information Inserted Successfully');
    }

    public function showDiscountList($id){
       $data = DB::select(' select *,product_discounts.id as id from product_discounts inner join products on product_discounts.product_id = products.id  inner join discount_markets on product_discounts.discount_market_id  = discount_markets.id inner join discount_types on discount_types.id = discount_markets.discount_id inner join days on days.id = discount_markets.day_of_week and discount_markets.market_id = ?',[$id]);
//       dd($data);
       return view('discountList',compact('data'));
    }


    public function checkforimage(){
       $market_id= $_GET['id'];
       $info = DB::select('select image from products where products.market = ? ',[$market_id]);
       $a=0;
       $b=0;
       while($a<count($info)){
           if ($info[$a]->image == null){
            $b++;
           }
       $a++;}


       if ($b != 0){
         return -1;
       }else{

           return 1;
       }
    }

    public function showDiscountProduct($id){
        $discount  =  DB::select('select *,discount_markets.id as id from  discount_markets  inner join markets on markets.id = discount_markets.market_id and discount_markets.market_id  = ?',[$id]);
        $count=0;
        while ($count < count($discount)){
            $discount_days = DiscountDayofweek::where('discount_market_id',$discount[$count]->id)->get();
            $discount[$count]->discounts = $discount_days;
            $days = $discount[$count]->discounts;
            $days_array =array();
            foreach($days as $day){
                 array_push($days_array,Day::find($day->day_id));
            }
            $day->day_id = $days_array;
            $discount[$count]->discount_id  = discount_type::find($discount[$count]->discount_id);
            $discount[$count]->image = media::find($discount[$count]->image);
            $discount[$count]->icon = media::find($discount[$count]->icon);
            $count++;
        }
        return $discount;
    }
    public function deleteDiscount(Request $request){
        DB::delete('delete from discount_dayofweeks where discount_market_id = ? ',[$request->discountId]);
        discount_market::destroy($request->discountId);
        return redirect(route('showDiscount',$request->marketId))->with('deleteMsg','Deleted Successfully');
    }
}
