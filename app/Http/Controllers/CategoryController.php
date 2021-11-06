<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use App\Models\media;
use App\Models\MC;

class CategoryController extends Controller
{
    public function index(){
        return view('categories');
    }

    public function insert(Request $request){

//        $request->validate([
//            'category'=>'required|string'
//        ]);
//        $media = new media();
//        $media->name=$request->imageName;
//        $media->thumb=$request->thumb;
//        $media->icon=$request->icon;
//        $media->size=$request->size;

//        $file=$request->file('url');
//        $ext=$file->getClientOriginalExtension();
//        $fileName=time().'.'.$ext;
//        $file->move('images/types_image/',$fileName);
//        $fileName='http://localhost:8000/images/market_image/'.$fileName;
//        $media->url=$fileName;
//        $media->save();

        $category=new Category();
        $category->category_name=$request->category;
//        $category->image=$media->id;
        $category->save();
        return redirect(route('showCategory'))->with('categorySuccessMsg','Category Inserted Successfully');

    }

    public function selectAll(){
        $categoryList=Category::all();
        return view('categoryList',compact('categoryList'));
    }
    public function showEditCategory($id){
        $category=Category::find($id);
        return view('editCategory',compact('category'));


    }

    public function update(Request $request){
        $category=Category::find($request->categoryId);
        $category->category_name=$request->category;
        $category->save();
        return redirect(route('showEditCategory',$request->categoryId))->with('updateCategoryMsg','Category Updated Successfully');
    }
    public function delete(Request $request){
       Category::destroy($request->categoryId);
        return redirect(route('showCategoryList'))->with('deleteCategoryMsg','Category Deleted Successfully');
    }

    public function selectCategoryId(Request $request){
        $id=$request->id;
        $data=DB::select('select category_name from categories where id = ? ',[$id]);
        if ($data){
            return $data[0]->category_name;
        }else{
            return  -1;
        }
    }
    public function selectAllApi(){
        $categories = Category::all();
        $a=0;
        while($a<count($categories)){
           if ($categories[$a]->image != null){
               $categories[$a]->image = media::find($categories[$a]->image);
           }
        $a++;}
        return $categories;

    }
    public function marketCategoryID($id){
        $data=DB::select('select * from market_categories where market_id = ?',[$id]);
//        $data[0]->cid=Category::find($data[0]->cid);
        $a=0;
        while($a<count($data)){
            $data[$a]->category_id=Category::find($data[$a]->category_id);
            if ($data[$a]->category_id->image != null){
                $imageID=$data[$a]->category_id->image;
                $data[$a]->category_id->image=media::find($imageID);
            }else{
                $data[$a]->category_id->image = null;
            }
            $a++;
        }
        return $data;
    }

    public function checkCategory(Request $request){
        $data =  DB::select('select * from market_categories where category_id    = ?' ,[$request->category_id,$request->market_id]);
        $a=0;
//        while($a<count($data)){
//            $data[$a]->media_id= media::find($data[$a]->media_id);
//
//            $info=DB::select('select * from market_categories inner join products on products.market  =  market_categories.market_id where products.image is not null and market_categories.market_id  = ?  and market_categories.category_id = ? ',[$data[$a]->market_id,$data[$a]->category_id]);
//            if ($data){
//                $data[$a]->isImageUsable="true";
//            }else{
//                $data[$a]->isImageUsable="false";
//            }
//        $a++;}
        $data[0]->media_id= media::find($data[0]->media_id);
        $info=DB::select('select * from market_categories inner join products on products.market  =  market_categories.market_id where products.image is not null and market_categories.market_id  = ?  and market_categories.category_id = ? ',[$request->market_id,$request->category_id]);
        if ($data){
                $data[0]->isImageUsable="true";
            }else{
                $data[0]->isImageUsable="false";
            }

        return $data;
    }
}
