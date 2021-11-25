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
    public $url = "http://localhost:8000/images";
    public function show(){
        $marketImages = DB::select('select media.id,url from markets inner join media on markets.image  = media.id ');
        $data=array();
        $data['markets']=DB::select('select id,name from markets');
        $data['products']=DB::select('select products.id,products.name,products.market from products ');
        return view('slides',compact('data','marketImages'));
    }

    public function insert(Request $request){
        $request->validate([
            'slideDescription'=>'required|string',
            'slideMarket'=>'required',
            'slideProduct'=>'required',
            'slideOrderNumber'=>'required|numeric',
        ]);
        $media = new media();
        $slide= new slide();
        if ($request->slidePriority == "0"){
            $file=$request->file('slideImage');
            $ext=$file->getClientOriginalExtension();
            $fileName=time().'.'.$ext;
            $file->move('images/slides_image/',$fileName);
            $fileName=$this->url.'/slides_image/'.$fileName;
            $media->url=$fileName;

        }else{
            $media->url = $request->chosenImageSlide;
        }
        $media->save();
        $slide->text=$request->slideDescription;
        $slide->media=$media->id;
        $slide->description_kurdish=$request->slideDescriptionKurdish;
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
        $marketImages = DB::select('select media.id,url from markets inner join media on markets.image  = media.id ');
        $data['market']=market::all();
        $data['slideProduct'] = DB::select('select * from markets inner join products on markets.id = products.market and markets.id = ? ',[$market]);
        $data['slide']=DB::select('select *,slides.market as slideMarket,slides.id as id from slides inner join markets on markets.id =slides.market inner join media on slides.media=media.id and slides.id = ?  ',[$slide]);
        $data['marketProduct'] = DB::select('select * from products where market = ?  ',[$market]);
        $slideInfo = DB::select('select * from slides where market  = ? and product = ? and id = ? ',[$market,$product,$slide]);
        return view('editSlide',compact('data','marketImages','slideInfo'));
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
        $slide->description_kurdish = $request->slideDescriptionKurdish;
        $slide->save();
        $media = media::find($request->mediaID);
        if ($request->slideImage != null){
            $file=$request->file('slideImage');
            $ext=$file->getClientOriginalExtension();
            $fileName=time().'.'.$ext;
            $file->move('images/slides_image/',$fileName);
            $fileName=$this->url.'/slides_image/'.$fileName;
            $media->url=$fileName;
        }else{
            $media->url = $media->url;
        }
        $media->save();
        $slide->save();
        return redirect(route('showSlideList'))->with('slideupdateSuccessMsg','Slide Inserted Successfully');
    }
}
