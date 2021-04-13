<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UpdateType;
class UpdateTypeController extends Controller
{
    public function index(){
        return view('updateType');
    }

    public function insertUpdateType(Request $request){
        $request->validate([
            'updateType'=>'required|string'
        ]);

        $updateType=new UpdateType();
        $updateType->type=$request->updateType;
        $updateType->save();
        return redirect(route('showUpdateType'))->with('insertUpdateTypeMsg','Update Type Inserted Successfully');
    }

    public function selectAll(){

        $updateTypeList=UpdateType::all();

        return view('updateTypeList',compact('updateTypeList'));
    }

    public function delete(Request $request){

        UpdateType::destroy($request->updateTypeId);
        return redirect(route('showUpdateTypeList'))->with('deleteUpdateTypeMsg','UpdateType Deleted Successfully');
    }

    public function showEditUpdateType($id){
        $data = UpdateType::find($id);
        return view('editUpdateType',compact('data'));
    }

    public function UpdateUpdateType(Request $request){
        $request->validate([
            'updateType'=>'required|string'
        ]);

        $data =UpdateType::find($request->updateTypeId);
        $data->type=$request->updateType;
        $data->save();

        return redirect(route('showEditUpdateType',$request->updateTypeId))->with('updateUpdateTypeMsg','Update type Updated Successfully');
    }
}
