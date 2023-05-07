<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Products;
class AdminController extends Controller
{
    // Trang view
    public function view_category()
    {
        $data = Categories::all();
        return view('admin.category',compact('data'));
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

    // Add product
    public function view_product()
    {
        $category = Categories::all();
        return view('admin.product',compact('category'));
    }

    public function add_product(REQUEST $request){
        $product = new Products();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->category = $request->category;
        $product->discount_price = $request->dis_price;


        $image= $request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('upload', $imagename);

        $product->image=$imagename;

        $product->save();
        return redirect()->back();
    }
}
