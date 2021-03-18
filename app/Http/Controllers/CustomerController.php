<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer;
use App\Events\confirmationMSGEvent;


class CustomerController extends Controller
{

  public function index()
    {
        //
    }


    public function sendRandomCode(Request $request){
      $phone=$request->phone;
        $randomNumber = rand(100000,999999);
        event(new confirmationMSGEvent($randomNumber,$phone));
        return $randomNumber;
    }
  public function insert(Request $request)
 {
   $customer =new customer();
   $customer->name=$request->name;
   $customer->password="uuhiuhi";
   $customer->phone=$request->phone;
   $customer->device_token=$request->device_token;
   $customer->api_token=$request->api_token;
   $customer->location="hbjhj";

   $customer->save();




    return $customer->id;


 }

 public function selectAll($id){
      $customer=customer::find($id);
      return response()->json($customer);
 }
}
