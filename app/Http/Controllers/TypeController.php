<?php

namespace App\Http\Controllers;

use App\Models\market;
use App\Models\media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Type;

class TypeController extends Controller
{
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

    public function selectMarketID(Request $request){
        $id=$request->id;

        $data['market']=DB::select('select * from markets where type = ? ',[$id]);
        $a=0;
        while($a<count($data['market'])){
            $data['market'][$a]->image=media::find($data['market'][$a]->image);
        $a++;
        }

        return $data['market'];

    }
}
