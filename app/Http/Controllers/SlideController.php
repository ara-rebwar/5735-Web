<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\slide;
use App\Models\media;
use Illuminate\Support\Facades\DB;

class SlideController extends Controller
{
    public function show(){
        $data=array();
        $data['markets']=DB::select('select id,name from markets');
//        $data['products']=array();
//        for ($a=0;$a<count($data['markets']);$a++){
//            $data['products'][$a]=DB::select('select products.id,products.name from products where products.market = ? ',[$data['markets'][$a]->id]);
//
//
//        }
        $data['products']=DB::select('select products.id,products.name,products.market from products ');


        return view('slides',compact('data'));
    }

    public function insert(Request $request){

        $media = new media();
        $slide= new slide();

        $media->name=$request->slideImageName;
//        $media->url=$request->slideImage;
        $media->thumb=$request->slideImageThumb;
        $media->icon=$request->slideImageIcon;
        $media->size=$request->slideImageSize;

        $file=$request->file('slideImage');
        $ext=$file->getClientOriginalExtension();
        $fileName=time().'.'.$ext;
        $file->move('images/slides_image/',$fileName);
        $media->url=$fileName;
        $media->save();
        $data=DB::select('select id from media where name= ?  and  url = ? ',[$request->slideImageName,$fileName]);


        $slide->text=$request->slideDescription;
        $slide->media=$data[0]->id;
        $slide->market=$request->slideMarket;
        $slide->product=$request->slideProduct;
        $slide->order=$request->slideOrderNumber;

        $slide->save();

        return redirect(route('showSlides'))->with('slideInsertSuccessMsg','Slide Inserted Successfully');



    }

    public function selectProduct($id){

        $id=$_GET['data'];


        $data=DB::select('select products.id,products.name,products.market from products where products.market = ? ',[$id]);

        return json_encode($data);
    }
}
