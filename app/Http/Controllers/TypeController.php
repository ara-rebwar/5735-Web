<?php

namespace App\Http\Controllers;

use App\Models\market;
use App\Models\media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Type;

class TypeController extends Controller
{

    public function index(){
        return view('types');
    }
    public function selectTypeId(Request $request){
        $id=$request->id;

        $data=DB::select('select types from types where id = ? ',[$id]);
        if ($data){
            return $data[0]->types;
        }else{
            return -1;
        }
    }
    public function selectAllApi(){
        return Type::all();
    }

    public function selectMarketID($id){


        $data['market']=DB::select('select * from markets where type = ? ',[$id]);
        $a=0;
        while($a<count($data['market'])){
            $data['market'][$a]->image=media::find($data['market'][$a]->image);
        $a++;
        }

        return $data['market'];

    }

    public function insertType(Request $request){
        $type =new Type();
        $media=new media();
        $media->name=$request->imageName;
        $media->thumb=$request->thumb;
        $media->icon=$request->icon;
        $media->size=$request->size;

        $file=$request->file('url');
        $ext=$file->getClientOriginalExtension();
        $fileName=time().'.'.$ext;
        $file->move('images/types_image/',$fileName);
        $fileName='http://phplaravel-559223-1799886.cloudwaysapps.com/images/market_image/'.$fileName;
        $media->url=$fileName;

        $media->save();

        $type->types=$request->types;
        $type->image=$media->id;
        $type->save();

        return redirect(route('showType'))->with('successTypeMsg','Type Inserted Successfully');
    }
}
