<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer;
use App\Events\confirmationMSGEvent;
use Illuminate\Support\Facades\DB;


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
   $customer->phone=$request->phone;
   $customer->alternative_number=$request->alternative_number;
   $customer->device_token=$request->device_token;
   $customer->api_token=$request->api_token;
   $customer->location=$request->location;
   $customer->address=$request->address;
   $customer->save();
    return $customer->id;
 }

 public function selectAll($id){
      $customer=customer::find($id);
      return response()->json($customer);
 }

     public function updateCustomerAPI(Request $request){
          $customer =customer::where("phone",$request->phone)->first();
          $customer->name=$request->name;
          $customer->password=$request->password;
          $customer->phone=$request->phone;
          $customer->alternative_number=$request->alternative_number;
          $customer->location=$request->location;
          $customer->address=$request->address;
          $customer->device_token=$request->device_token;
          $customer->api_token=$request->api_token;
          $customer->save();
          return 'updated';
     }
}
