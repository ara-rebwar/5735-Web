<?php

namespace App\Http\Controllers;

use App\Models\MarketCategory;
use App\Models\media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MarketCategoryController extends Controller
{
    public function show(){
        return view('marketCategory.marketCategory');
    }
    public function showMarketCategory($id){
        $data=DB::select('select * from market_categories inner join categories on market_categories.category_id = categories.id and market_categories.market_id = ? ',[$id]);
//        return redirect(route('showMarketCategory',$id))->with(compact('data'));
        return view('marketCategory.marketCategory',compact('data'));
    }

    public function insertMarketCategory(Request $request){

        $limit= $request->limit;
        $a=0;

        while($a<$limit){
            $media = new media();
            $file = $request->{'categoryImage'.(string)$a};
            $ext = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $ext;
            $file->move('images/marketCategory_image/', $fileName);
            $fileName = 'http://62.201.253.178:89/images/marketCategory_image/' . $fileName;
            $media->url = $fileName;
            $media->save();
            $marketCategory =new MarketCategory();
            $marketCategory->market_id=$request->market_id;
            $marketCategory->category_id= $request->{'category_id'.(string)$a};
            $marketCategory->media_id=$media->id;
            $marketCategory->save();
        $a++;}
        return redirect(route('showMarketCategories',$request->market_id))->with('successMSG','Information Inserted Successfully');

    }

}
