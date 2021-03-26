<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
}
