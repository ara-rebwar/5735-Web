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
            'slideImage'=>'required',
        ]);
        $media = new media();
        $slide= new slide();
        $file=$request->file('slideImage');
        $ext=$file->getClientOriginalExtension();
        $fileName=time().'.'.$ext;
        $file->move('images/slides_image/',$fileName);
        $fileName='http://62.201.253.178:89/images/slides_image/'.$fileName;
        $media->url=$fileName;
        $media->save();
        $slide->text=$request->slideDescription;
        $slide->media=$media->id;
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
        $slideList =DB::select('select *,slides.id as slideId ,products.name as slideProduct , markets.name as slideMarket ,media.id as mediaId from slides inner join media on slides.media = media.id  inner join products on products.id = slides.product inner join markets on markets.id = slides.market');
        return view('slideList',compact('slideList'));
    }
    public function showEditSlideID($slide,$market,$product){
        $data['market']=market::all();
        $data['slideProduct'] = DB::select('select * from slides inner join products on products.id  = slides.product where slides.market = ? and slides.product = ?  ',[$market,$product]);
        $data['slide']=DB::select('select *,slides.market as slideMarket,slides.id as id from slides inner join markets on markets.id =slides.market inner join media on slides.media=media.id and slides.id = ?  ',[$slide]);
        return view('editSlide',compact('data'));

    }
    protected function delete(Request $request)
    {
        $id=$request->slideId;
        $mediaId=$request->mediaId;
        media::destroy($mediaId);
        slide::destroy($id);
        return redirect(route('showSlideList'))->with('deleteSlideMsg','Slide Deleted Successfully');
    }
    public function selectAll(){
        $i=0;
        $data=slide::all();
        while($i<count($data)){
            $data[$i]->media=media::find($data[$i]->media);
            $data[$i]->product=product::find($data[$i]->product);
            $data[$i]->market=market::find($data[$i]->market);

            $i++;
        }
        return response()->json($data);
    }

    public function selectSlideById($id){
        $slide=slide::find($id);
        return response()->json($slide);
    }

    public function updateSlide(Request $request){
        $request->validate([
            'slideMarket'=>'required',
            'slideProduct'=>'required',
            'slideDescription'=>'required',
            'slideOrderNumber'=>'required',
        ]);
        $slide = slide::find($request->slideID);
        $slide->order = $request->slideOrderNumber;
        $slide->text = $request->slideDescription;
        $slide->product = $request->slideProduct;
        $slide->market = $request->slideMarket;
        $slide->save();
        $media = media::find($request->mediaID);
        if ($request->slideImage != null){
            $file=$request->file('slideImage');
            $ext=$file->getClientOriginalExtension();
            $fileName=time().'.'.$ext;
            $file->move('images/slides_image/',$fileName);
            $fileName='http://62.201.253.178:89/images/slides_image/'.$fileName;
            $media->url=$fileName;
        }else{
            $media->url = $media->url;
        }
        $media->save();
        $slide->save();
        return redirect(route('showSlideList'))->with('slideupdateSuccessMsg','Slide Inserted Successfully');
    }
}
