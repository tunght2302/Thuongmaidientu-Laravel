<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


use App\Models\Products;
use App\Models\Categories;
use App\Models\Carts;
use App\Models\Orders;
use App\Models\Comments;

class HomeController extends Controller
{
    public function redirect()
    {
        $usertype = Auth::user()->usertype;
        if ($usertype == '1') {
            return view('admin.home');
        } else {
            $product = Products::paginate(8);
            $pro_view = Products::orderBy('view', 'desc')->take(8)->get();
            return view('client.index', compact('product', 'pro_view'));
        }
    }
    // Trang chủ
    public function index()
    {
        $product = Products::paginate(8);
        $pro_view = Products::orderBy('view', 'desc')->take(8)->get();
        return view('client.index', compact('product', 'pro_view'));
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
        $comments = Comments::where('product_id', $product->id)->paginate(4);
        $totalComments = Comments::where('product_id', $product->id)->count();
        $product->view += 1;
        if ($product) {
            $cate = $product->category;
            $simpro = Products::where('category', '=', $cate)
                ->where('id', '!=', $id)->get();
        }
        $product->save();
        return view('client.product_detail', compact('product', 'comments', 'totalComments', 'simpro'));
    }
    // Lọc sản phẩm theo danh mục
    public function product_by_category($category_name)
    {
        $categories = Categories::all();
        $category = Categories::where('category_name', $category_name)->firstOrFail();
        $products = Products::where('category', '=', $category->category_name)->paginate(9);
        return view('client.product_by_category', compact('categories', 'category', 'products'));
    }
    // Thêm sản phẩm vào giỏ hàng
    public function add_cart(Request $request, $id)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $product = Products::find($id);

            $existingCartItem = Carts::where('user_id', $user->id)
                ->where('product_id', $product->id)
                ->first();
            if ($existingCartItem) {
                // Nếu sản phẩm đã tồn tại trong giỏ hàng, chỉ cập nhật số lượng
                $existingCartItem->quantity += $request->quantity;
                $existingCartItem->save();
            } else {
                // Nếu sản phẩm chưa tồn tại trong giỏ hàng, thêm sản phẩm mới vào
                $cart = new Carts;
                $cart->user_id = $user->id;

                $cart->product_id = $product->id;
                $cart->product_title = $product->title;
                $cart->price = $product->price;
                $cart->quantity = $request->quantity;
                $cart->image = $product->image;

                $cart->save();
            }
            return redirect()->back();
        } else {
            return redirect('login');
        }
    }
    // giỏ hàng
    public function show_cart()
    {
        if (Auth::check()) {
            $id = Auth::user()->id;
            $carts = Carts::where('user_id', '=', $id)->get();
            return view('client.show_cart', compact('carts'));
        } else {
            return redirect('login');
        }
    }
    // Xoá sản phẩm trong giỏ hàng
    public function delete_cart($id)
    {
        $delete_cart = Carts::find($id);
        $delete_cart->delete();
        return redirect()->back();
    }
    // Update sản phẩm trong giỏ hàng
    public function update_cart(Request $request)
    {
        $cartItems = $request->cart_items;

        foreach ($cartItems as $cartItemId => $cartItemData) {
            $cart = Carts::find($cartItemId);

            if ($cart) {
                $cart->quantity = $cartItemData['quantity'];
                $cart->save();
            }
        }

        return redirect()->back()->with('success', 'Cập nhật giỏ hàng thành công');
    }
    // Xoá toàn bộ giỏ hàng
    public function cart_destroy()
    {
        Carts::truncate();

        return redirect()->back();
    }
    // Check out
    public function check_out()
    {
        if (Auth::id()) {
            $data = Auth::user();
            $id = Auth::user()->id;
            $data_cart = Carts::where('user_id', '=', $id)->get();
            return view('client.checkout', compact('data', 'data_cart'));
        } else {
            return redirect('login');
        }
    }

    public function cash_order(REQUEST $request)
    {
        $id = Auth::user()->id;
        $data_order = Carts::where('user_id', '=', $id)->get();
        foreach ($data_order as $orders) {
            $order = new Orders;

            $order->name = $request->name;
            $order->email = $request->email;
            $order->phone = $request->phone;
            $order->address = $request->address;
            $order->user_id = $orders->user_id;

            $order->product_title = $orders->product_title;
            $order->quantity = $orders->quantity;
            $order->price = $orders->price;
            $order->image = $orders->image;
            $order->product_id = $orders->product_id;

            $total = 0;
            $subtotal = $orders->quantity * $orders->price;
            $total += $subtotal;
            $order->total = $total;

            $order->payment_status = 'Cash on delivery';
            $order->delivery_status = 'Chờ xử lý';

            $cart_id = $orders->id;
            $delete_cart = Carts::find($cart_id);

            $delete_cart->delete();
            $order->save();
        }
        return redirect()->back()->with('success_message', 'Đặt hàng thành công');
    }

    public function order()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $order = Orders::where('user_id', $user->id)->get();
            return view('client.order', compact('order'));
        } else {
            return redirect('login');
        }
    }

    public function cancel($id)
    {
        $order = Orders::find($id);

        $order->delivery_status = 'Bạn đã huỷ đơn hàng';

        $order->save();
        return redirect()->back();
    }

    public function comment(REQUEST $request, $id)
    {
        if (Auth::check()) {
            $product = Products::find($id);
            $user = Auth::user();
            $comment = new Comments();

            $comment->name = $user->name;
            $comment->user_id = $user->id;

            $comment->content = $request->content;

            $comment->product_title = $product->title;
            $comment->product_id = $product->id;

            $comment->save();


            return redirect()->back();
        } else {
            return redirect('login');
        }
    }

    public function search_product(REQUEST $request)
    {

        $search_product = $request->search;
        $pro_view = Products::orderBy('view', 'desc')->take(8)->get();
        $product = Products::where('title', 'LIKE', "%$search_product%")->paginate(8);

        return view('client.index', compact('product', 'pro_view'));
    }

    public function search_product_shop(REQUEST $request)
    {

        $search_product = $request->search;
        $categories = Categories::all();
        $product = Products::where('title', 'LIKE', "%$search_product%")->paginate(8);

        return view('client.shop', compact('product', 'categories'));
    }
}
