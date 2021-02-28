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
   $customer->email=$request->email;
   $customer->save();

   $randomNumber = rand(100000,999999);
   $phone=$request->phone;
   $customer->phone=$phone;
   $customer->randomNumber=$randomNumber;
   event(new confirmationMSGEvent($randomNumber,$phone));

    return response()->json($customer);
 }
}
