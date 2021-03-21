<?php

namespace App\Http\Controllers;

use App\Models\market;
use App\Models\product;
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
        $request->validate([
            'slideDescription'=>'required|string',
            'slideMarket'=>'required',
            'slideProduct'=>'required',
            'slideOrderNumber'=>'required|numeric',
            'slideImageName'=>'required|string',
            'slideImageThumb'=>'required|string',
            'slideImageIcon'=>'required|string',
            'slideImageSize'=>'required|numeric',
            'slideImage'=>'required',
        ]);
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
        $fileName='http://phplaravel-559223-1799886.cloudwaysapps.com/images/slides_image/'.$fileName;
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


    public function showSlideList(){
        $slideList=DB::select('select slides.id as slideId,products.name as slideProduct, markets.name as slideMarket ,text ,slides.order,media.id as mediaId from slides inner join products on products.id=slides.product inner join markets on markets.id=slides.market inner join media on media.id = slides.media ');
        return view('slideList',compact('slideList'));
    }

    public function showEditSlideID($id){
        $data['market']=market::all();
//        $data['product']=product::all();
        $data['slide']=DB::select('select *,media.name as imageName,slides.market as slideMarket from slides inner join markets on markets.id =slides.market inner join media on slides.media=media.id and slides.id = ?  ',[$id]);

        return view('editSlide',compact('data'));
    }
    protected function delete(Request $request)
    {
        $id=$request->slideId;
        $mediaId=$request->mediaId;


        $media=media::destroy($mediaId);
        $slide=slide::destroy($id);
        return redirect(route('showSlideList'))->with('deleteSlideMsg','Slide Deleted Successfully');

    }


    public function selectAll(){
        $slides=DB::select('select *,products.name as productName,markets.name as marketName,media.name as imageName from slides inner join products on products.id=slides.product inner join markets on markets.id=slides.market inner join media on media.id=slides.media');
        return response()->json($slides);
    }

    public function selectSlideById($id){
        $slide=slide::find($id);
        return response()->json($slide);
    }
}
