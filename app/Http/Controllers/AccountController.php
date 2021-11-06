<?php

namespace App\Http\Controllers;

use App\Models\Address;
use Illuminate\Http\Request;
use App\Models\market;
use App\Models\Account;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AccountController extends Controller
{
    public function index(){
        $market=market::all();
        return view('accounts',compact('market'));
    }
    public function insert(Request $request){
        $account =new Account();
        $account->username=$request->username;
        $account->market=$request->market;
        $account->password = $request->password;
        $account->save();
        return redirect(route('showAccounts'))->with('successAccountMsg','Account Inserted Successfully');
    }

    public function selectAll(){
        $data=DB::select('select *,accounts.id as accountId from accounts inner join markets on markets.id=accounts.market');
        return view('accountList',compact('data'));
    }
    public function delete(Request $request){
        Account::destroy($request->accountId);
        return redirect(route('showAccountList'))->with('successDeleteAccount','Account Deleted Successfully');
    }

    public function showEditAccount($id){
        $data['market']=market::all();
        $data['account']=DB::select('select * from accounts where id= ? ',[$id]);
        return view('editAccount',compact('data'));
    }

    public function updateAccount(Request $request){
        $account=Account::find($request->accountId);
        $account->username=$request->username;
//        $account->password=$request->password;
        $account->market=$request->market;
        $account->save();
        return redirect(route('showEditAccount',$request->accountId))->with('updateAccountMsg','Account Updated Successfully');
    }
    public function authenticate(Request $request){
        $username=$request->username;
//        $password=$request->password;

        $data=DB::select('select * from accounts where username = ?   ',[$username]);

        if ($data){

            $info['id']=$data[0]->id;
            $info['market']=$data[0]->market;
            return $info;
        }else{
            return -1;
        }
    }

    public function selectAllApi(){
        $data = Address::all();
        return $data;
    }
    public function selectAddressId(Request $request){
        $data = Address::find($request->id);
        return $data ;
    }
}
