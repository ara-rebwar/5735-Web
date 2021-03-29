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
        $media = new media();
        $media->name=$request->imageName;
        $media->thumb=$request->thumb;
        $media->icon=$request->icon;
        $media->size=$request->size;

        $file=$request->file('url');
        $ext=$file->getClientOriginalExtension();
        $fileName=time().'.'.$ext;
        $file->move('images/types_image/',$fileName);
        $fileName='http://phplaravel-559223-1799886.cloudwaysapps.com/images/market_image/'.$fileName;
        $media->url=$fileName;
        $media->save();

        $category=new Category();
        $category->category_name=$request->category;
        $category->image=$media->id;
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
        return Category::all();
    }


    public function marketCategoryID($id){
        $data=DB::select('select * from m_c_s where mid = ?',[$id]);
//        $data[0]->cid=Category::find($data[0]->cid);
        $a=0;
        while($a<count($data)){
            $data[$a]->cid=Category::find($data[$a]->cid);
            if ($data[$a]->cid->image != null){
                $imageID=$data[$a]->cid->image;
                $data[$a]->cid->image=media::find($imageID);
            }else{
                $data[$a]->cid->image = null;
            }
            $a++;
        }

        return $data;
    }
}
