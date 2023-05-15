<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Categories;
use App\Models\Carts;

class HomeController extends Controller
{
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
    // Trang chủ
    public function index()
    {
        $product = Products::paginate(8);
        return view('client.index', compact('product'));
    }
    // Trang shop
    public function shop()
    {
        $categories = Categories::all();
        $product = Products::paginate(9);
        return view('client.shop', compact('categories', 'product'));
    }
    // Chi tiết sản phẩm
    public function product_detail($id)
    {
        $product = Products::find($id);
        return view('client.product_detail', compact('product'));
    }
    // Lọc sản phẩm theo danh mục
    public function product_by_category($category_name)
    {
        $categories = Categories::all();
        //lấy ra đối tượng danh mục với tên được chỉ định bằng ($category_name) thông qua câu truy vấn.
        // Nếu không tìm thấy danh mục tương ứng, phương thức firstOrFail() sẽ gây ra một ngoại lệ.
        $category = Categories::where('category_name', $category_name)->firstOrFail();
        //Tìm tất cả các sản phẩm có trường category bằng với (category_name) của danh mục đã được tìm thấy ở dòng trước đó.
        //Các sản phẩm tương ứng được lấy ra thông qua phương thức get() và gán vào biến $products.
        $products = Products::where('category', '=', $category->category_name)->get();
        return view('client.product_by_category', compact('categories', 'category', 'products'));
    }

    public function add_cart(REQUEST $request,$id)
    {
        if (Auth::id()) {
           $user = Auth::user();
           $product = Products::find($id);

           $cart = new Carts;
           $cart->user_id = $user->id;
           $cart->name = $user->name;
           $cart->email = $user->email;
           $cart->phone = $user->phone;
           $cart->address = $user->address;

           $cart->product_id = $product->id;
           $cart->product_title = $product->title;
           $cart->price = $product->price;
           $cart->quantity = $request->quantity;
           $cart->image = $product->image;

           $cart->save();
           return redirect()->back();

        } else {
            return redirect('login');
        }
    }
}
