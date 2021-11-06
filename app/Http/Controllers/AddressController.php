<?php

namespace App\Http\Controllers;

use App\Models\All_Address;
use Illuminate\Http\Request;
use App\Models\Address;
class AddressController extends Controller
{
    public function index(){
        $locations = All_Address::all();
        return view('address',compact('locations'));
    }

    public function insertAddress(Request $request){
        $request->validate([
            'place1'=>'required',
            'place2'=>'required',
            'price'=>'required|integer'
        ]);
        $address =new Address();

        $address->place1=$request->place1;
        $address->place2=$request->place2;
        $address->price=$request->price;
        $address->save();
        return redirect(route('showAddress'))->with('insertAddressMsg','Address Inserted Successfully');

    }
    public function selectAll(){
        $locations = All_Address::all();
        $addressList=Address::all();
        return view('addressList',compact('addressList','locations'));
    }


    public function showEditAddress($id){
        $locations = All_Address::all();
        $data=Address::find($id);
        return view('editAddress',compact('data','locations'));
    }

    public function UpdateAddress(Request $request){
        $request->validate([
            'place1'=>'required|string',
            'place2'=>'required|string',
            'price'=>'required|integer'
        ]);
        $address = Address::find($request->addressId);
        $address->place1=$request->place1;
        $address->place2=$request->place2;
        $address->price=$request->price;
        $address->save();
        return redirect(route('showEditAddress',$request->addressId))->with('updateAddressMsg','Address Updated Successfully');
    }



    public function delete(Request $request){
        $id=$request->AddressId;
        Address::destroy($id);
        return redirect(route('showAddressList'))->with('deleteAddressMsg','Address Deleted Successfully');
    }


}
