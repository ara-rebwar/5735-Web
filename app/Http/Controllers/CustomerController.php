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
  public function insert(Request $request)
 {
   $customer =new customer();
   $customer->name=$request->name;
   $customer->password=$request->password;
   $customer->phone=$request->phone;
   $customer->device_token=$request->device_token;
   $customer->api_token=$request->api_token;
   $customer->location=$request->location;

   $customer->save();

   $randomNumber = rand(100000,999999);
   $phone=$request->phone;
//   $customer->phone=$phone;
   $customer->randomNumber=$randomNumber;
   event(new confirmationMSGEvent($randomNumber,$phone));

    return response()->json($customer);


 }

 public function selectAll($id){
      $customer=customer::find($id);
      return response()->json($customer);
 }
}
