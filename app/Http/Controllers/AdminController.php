<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function viewCategory()
    {
        $data=Category::all();

        return view("admin.layout.category",compact("data")) ;
    }
    
    public function addCategory(Request $request)
    {
        $data = new Category();
        $data->category_name=$request->category;
        $data->save();
        //  return $request->session()->all();
        return redirect()->back()->with("message","Category is Added");
    }

    public function deleteCategory($id)
    {
        if($id!=null){
        $data=Category::find($id);
        $data->delete();}
        else{
            echo "id is null";
        }

        return redirect()->back()->with("message","deleted successfully");
    }

    public function viewProduct()
    {
        return view("admin.layout.product") ;
    }
}
