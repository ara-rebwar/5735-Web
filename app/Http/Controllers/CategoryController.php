<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function index(){
        return view('categories');
    }

    public function insert(Request $request){
        $request->validate([
            'category'=>'required|string'
        ]);
        $category=new Category();
        $category->category_name=$request->category;
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
}
