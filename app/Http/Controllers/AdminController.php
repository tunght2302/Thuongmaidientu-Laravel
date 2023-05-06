<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
class AdminController extends Controller
{
    // Trang view
    public function view_category()
    {
        $data = Categories::all();
        return view('admin.categoris.category',compact('data'));
    }
    // Add category
    public function add_category(REQUEST $request){
        $data = new Categories();
        $data->category_name = $request->category;
        
        $data->save();
        return redirect()->back()->with('message','Category Added Successfully');
    }
    // Delete category
    public function delete_category($id){
        $data = Categories::find($id);

        $data->delete();
        return redirect()->back()->with('delete_category','Category Deleted Successfully');
    }
}
