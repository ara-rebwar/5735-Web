<?php

namespace App\Http\Controllers;

use App\Models\market;
use App\Models\media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Type;

class TypeController extends Controller
{
    public $url = "http://62.201.253.178:89/images";
    public function index(){
        return view('types');
    }
    public function selectTypeId(Request $request){
        $id=$request->id;
        $data=DB::select('select types from types where id = ? ',[$id]);
        if ($data){
            return $data;
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
        $file=$request->file('url');
        $ext=$file->getClientOriginalExtension();
        $fileName=time().'.'.$ext;
        $file->move('images/types_image/',$fileName);
        $fileName=$this->url.'/types_image/'.$fileName;
        $media->url=$fileName;
        $media->save();
        $type->types=$request->types;
        $type->image=$media->id;
        $type->save();
        return redirect(route('showType'))->with('successTypeMsg','Type Inserted Successfully');
    }
    public function selectAll(){
        $typeList = DB::select('select *,types.id as typeId from types inner join media on media.id = types.image');
        return view('typeList',compact('typeList'));
    }
    public function showEditType($id){
        $data=DB::select('select *,types.id as typeId from types inner join media on types.image=media.id and types.id = ? ',[$id]);
        return view('editType',compact('data'));
    }
    public function updateType(Request $request){
        $request->validate([
            'types'=>'required',
        ]);
        $media=media::find($request->mediaID);
        $file=$request->file('url');
        if ($file){
            $ext=$file->getClientOriginalExtension();
            $fileName=time().'.'.$ext;
            $file->move('images/types_image/',$fileName);
            $fileName=$this->url.'/types_image/'.$fileName;
            $media->url=$fileName;
        }
        $media->save();
        $type=Type::find($request->typeID);
        $type->types=$request->types;
        $type->save();
        return redirect(route('showEditType',$request->typeID))->with('updateTypeMsg','Type Updated Successfully');
    }
    public function delete(Request $request){
        $id=$request->TypeId;
        Type::destroy($id);
        return redirect(route('showTypeList'))->with('typeDeleteMsg','Type Deleted Successfully');
    }
}
