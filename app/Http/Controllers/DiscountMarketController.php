<?php

namespace App\Http\Controllers;

use App\Models\Day;
use App\Models\discount_market;
use App\Models\discount_type;
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
        try {
            $discount_type=new discount_type();
            $discount_type->type_name=$request->discount_type;
            $discount_type->rate=$request->rate;
            $discount_type->save();
            $discount_market =  new discount_market();
            $discount_market->market_id= $request->market_id;
            $discount_market->discount_id= $discount_type->id;
            $discount_market->day_of_week= $request->day;
            $discount_market->start_time= $request->start_time;
            $discount_market->end_time =  $request->end_time;
            $discount_market->save();

            $market =  market::find($request->market_id);
            $market->discount = $discount_market->id;
            $market->save();


            //zyakrdni discount bo product akani market ek bapei aw form ai ka la discount.blade.php haya
//            $a = 0;
//            while($a< count($request->product)){
//                $discount_id=DB::select('select id from product_discounts order by id  desc limit 1');
//                $discount_product = new product_discount();
//                if ($discount_id == null){
//                    $discount_product->id=1;
//                }else{
//                    $discount_product->id = ++$discount_id[0]->id;
//                }
//                $discount_product->discount_market_id =$discount_market->id;
//                $discount_product->product_id =$request->product[$a];
//                $discount_product->save();
//                $a++;
//            }
        }catch (\Exception $e){
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
//        $data = DB::select('select * from products  where products.market = ?   ',[$id]);
//        $discount=DB::select('select * from discount_markets inner join product_discounts on product_discounts.discount_market_id = discount_markets.id inner join discount_types on discount_types.id=discount_markets.discount_id inner join days on days.id = discount_markets.day_of_week and discount_markets.market_id= ?',[$id]);
//        $a=0;
//        for ($i =0 ; $i<count($data); $i++){
//            $data[$i]->image = media::find($data[$i]->image);
//            for ($b=0;$b<count($discount);$b++){
//                if ($data[$i]->id == $discount[$b]->product_id){
//                    $data[$i]->discount[0]['day']= $discount[$b]->day;
//                    $data[$i]->discount[0]['start_time']= $discount[$b]->start_time;
//                    $data[$i]->discount[0]['end_time']= $discount[$b]->end_time;
//                    $data[$i]->discount[0]['rate']= $discount[$b]->rate;
//                    break;
//                }else{
//                    $data[$i]->discount =null;
//                }
//            }
//        }
//        return $data;
        $discount  =  DB::select('select * from  discount_markets  inner join markets on markets.id = discount_markets.market_id and discount_markets.market_id  = ?',[$id]);
        $count=0;
        while ($count < count($discount)){
            $discount[$count]->day_of_week = Day::find($discount[$count]->day_of_week);
            $discount[$count]->discount_id  = discount_type::find($discount[$count]->discount_id);
            $discount[$count]->image = media::find($discount[$count]->image);
            $discount[$count]->icon = media::find($discount[$count]->icon);
            $count++;
        }
        return $discount;
    }


    public function deleteDiscount(Request $request){
        discount_market::destroy($request->discountId);
        return redirect(route('showDiscount',$request->marketId))->with('deleteMsg','Deleted Successfully');
    }
}
