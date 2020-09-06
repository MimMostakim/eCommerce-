<?php

namespace App\Http\Controllers;

use App\Category;
use DB;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){

        $categories = Category::all();
//        return $categories;
        return view('admin.category.category',[
            'categories' => $categories
        ]);
    }

    public function addCategory(){
        return view('admin.category.add-category');
    }

    public function saveCategory(Request $request){
//        Category::create($request->all());
        $request->validate([
            'cat_name' => 'required|alpha|max:10|min:3|regex:^\w+@[a-zA-Z_]+?\.[a-zA-Z]{2,3}$',
            'cat_desc' => 'required',
            'status' => 'regex:/^([0-1]+)$/'
        ]);


        $category = new Category();
        $category->cat_name = $request->cat_name;
        $category->cat_desc = $request->cat_desc;
        $category->status = $request->status;
        $category->save();
//        DB::table('categories')->insert([
//           'cat_name' =>  $request->cat_name,
//           'cat_desc' =>  $request->cat_desc,
//           'status' =>  $request->status,
//        ]);

        return back()->with('message','Category Saved Successfully');
    }

    public function unpublishCategory($id){
        $category = Category::find($id);
        $category->status = 0;
        $category->save();

        return back();
    }
    public function publishCategory($id){
        $category = Category::find($id);
        $category->status = 1;
        $category->save();

        return back();
    }

    public function editCategory($id){
        $category = Category::find($id);
        //return $category;
        return view('admin.category.edit-category',[
            'category' => $category
        ]);
    }

    public function updateCategory(Request $request){
        $category = Category::find($request->id);

        $category->cat_name = $request->cat_name;
        $category->cat_desc = $request->cat_desc;
        $category->status = $request->status;
        $category->save();

        return back()->with('message','Category Updated Successfully');
    }

    public function deleteCategory($id){
        $category = Category::find($id);
        $category->delete();

        return back();
    }
}
