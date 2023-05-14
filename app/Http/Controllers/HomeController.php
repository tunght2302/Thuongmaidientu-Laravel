<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;

class HomeController extends Controller
{
    public function index()
    {
        $product = Products::paginate(8);
        return view('client.index', compact('product'));
    }
    
    public function shop()
    {
        $categories = Categories::all();
        $product = Products::paginate(9);
        return view('client.shop', compact('categories', 'product'));
    }
    
    public function product_by_category($category_name)
    {
        $categories = Categories::all();
        // Đây là một truy vấn sử dụng model Categories để tìm kiếm các bản ghi
        // trong bảng Categories với trường category_name bằng với giá trị được cung cấp ($category_name).
        $category = Categories::where('category_name',$category_name)->firstOrFail();
        $products = Products::where('category','=', $category->category_name)->get();
        return view('client.product_by_category', compact('categories','category', 'products'));
    }

    public function redirect()
    {
        $usertype = Auth::user()->usertype;
        if ($usertype == '1') {
            return view('admin.home');
        } else {
            $product = Products::paginate(8);
            return view('client.index', compact('product'));
        }
    }

    public function product_detail($id)
    {
        $product = Products::find($id);
        return view('client.product_detail', compact('product'));
    }
}
