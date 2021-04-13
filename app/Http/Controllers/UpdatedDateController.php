<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UpdatedDate;
use App\Models\UpdateType;
use Illuminate\Support\Facades\DB;

class UpdatedDateController extends Controller
{
    public function index(){
        $data=UpdateType::all();
        return view('updatedDate',compact('data'));
    }

    public function insertUpdateDate(Request $request){
        $request->validate([
            'type'=>'required',
            'updateDate'=>'required'
        ]);
        $updatedDate=new UpdatedDate();
        $updatedDate->date=$request->updateDate;
        $updatedDate->type=$request->type;

        $updatedDate->save();

        return redirect(route('showUpdatedDate'))->with('insertUpdateDateMsg','Update Date Inserted Successfully');

    }

    public function selectAll(){

        $updatedDateList=DB::select('select *,updated_dates.id as UID from updated_dates inner join update_types on updated_dates.type=update_types.id');
        return view('updatedDateList',compact('updatedDateList'));
    }

    public function delete(Request $request){
        UpdatedDate::destroy($request->UID);
        return redirect(route('showUpdatedDateList'))->with('deleteUpdatedDateMsg','Update Date Deleted Successfully');
    }


    public function showEditUpdatedDate($id){

        $data['updatedDate']=UpdatedDate::find($id);
        $data['update_type']=UpdateType::all();
        return view('editUpdatedDate',compact('data'));
    }

    public function UpdateUpdateDate(Request $request){
        $request->validate([
            'type'=>'required',
            'updateDate'=>'required'
        ]);

        $updatedDate=UpdatedDate::find($request->updateDateId);

        $updatedDate->type=$request->type;
        $updatedDate->date=$request->updateDate;
        $updatedDate->save();

        return redirect(route('showEditUpdatedDate',$request->updateDateId))->with('updateUpdatedDateMsg','Update Date Updated Successfully');

    }


}
