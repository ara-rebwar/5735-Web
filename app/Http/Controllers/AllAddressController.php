<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\All_Address;

class AllAddressController extends Controller
{
    public function index(){
        return view('AllAddress');
    }

    public function insertLocation(Request $request){
        $request->validate([
            'place1'=>'required|string',
            'place2'=>'required|string'
        ]);
        $allAddress = new All_Address();
        $allAddress->place1=$request->place1;
        $allAddress->place2=$request->place2;
        $allAddress->save();

        return redirect(route('showLocation'))->with('insertLocationMsg','Location Inserted Successfully');

    }

    public function selectAll(){
        $allLocationList= All_Address::all();
        return view('allAddressList',compact('allLocationList'));

    }

    public function delete(Request $request){
        All_Address::destroy($request->locationId);
        return redirect(route('showLocationList'))->with('deleteLocationMsg','Location Deleted Successfully');
    }

    public function showEditLocation($id){
        $data = All_Address::find($id);
        return view('editAllAddress',compact('data'));
    }

    public function UpdateLocation(Request $request){
        $request->validate([
            'place1'=>'required|string',
            'place2'=>'required|string'
        ]);

        $allAddress=All_Address::find($request->locationId);
        $allAddress->place1=$request->place1;
        $allAddress->place2=$request->place2;
        $allAddress->save();
        return redirect(route('showEditLocation',$request->locationId))->with('updateLocationMsg','Location Updated Successfully');

    }





}
