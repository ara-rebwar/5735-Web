<?php

namespace App\Http\Controllers;

use Google\Cloud\Firestore\FirestoreClient;
use Illuminate\Http\Request;


class FirebaseController extends Controller
{

    public function index($id)
    {


        $data = explode(',', $id);
        $documentID = $data[0];

        $marketID = $data[1];


//        $db = new FirestoreClient([
//            "projectId" => "project-430746127367390399"
//        ]);
//        $data = $db->collection('Order')->document($request->marketID)->collection('orders')->document($request->id);
//
//        $update=$data->update([
//            [
//                "path"=>"isReady",
//                "value"=>false
//            ]
//        ]);
//        dd($data);
////        $data = $db->collection('Order')->document($marketID)->collection('orders')->document($documentID)->
//


    }
}
