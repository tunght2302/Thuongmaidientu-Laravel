<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\User;
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
            $pro_view = Products::orderBy('view', 'DESC')->take(8)->get();
            return view('client.index', compact('product', 'pro_view'));
        }
    }
    // Trang chủ
    public function index()
    {
        $product = Products::paginate(8);
        $pro_view = Products::orderBy('view', 'DESC')->take(8)->get();
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
        //lấy ra đối tượng danh mục với tên được chỉ định bằng ($category_name) thông qua câu truy vấn.
        // Nếu không tìm thấy danh mục tương ứng, phương thức firstOrFail() sẽ gây ra một ngoại lệ.
        $category = Categories::where('category_name', $category_name)->firstOrFail();
        //Tìm tất cả các sản phẩm có trường category bằng với (category_name) của danh mục đã được tìm thấy ở dòng trước đó.
        //Các sản phẩm tương ứng được lấy ra thông qua phương thức get() và gán vào biến $products.
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
                // Cập nhật các trường thông tin khác của giỏ hàng nếu cần
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
        $data = Auth::user();
        $id = Auth::user()->id;
        $data_cart = Carts::where('user_id', '=', $id)->get();
        return view('client.checkout', compact('data', 'data_cart'));
    }

    public function cash_order()
    {
        $id = Auth::user()->id;
        $data_order = Carts::where('user_id', '=', $id)->get();
        foreach ($data_order as $data_order) {
            $order = new Orders;

            $order->name = $data_order->name;
            $order->email = $data_order->email;
            $order->phone = $data_order->phone;
            $order->address = $data_order->address;
            $order->user_id = $data_order->user_id;

            $order->product_title = $data_order->product_title;
            $order->quantity = $data_order->quantity;
            $order->price = $data_order->price;
            $order->image = $data_order->image;
            $order->product_id = $data_order->product_id;

            $order->payment_status = 'Cash on delivery';
            $order->delivery_status = 'Chờ xử lý';

            $cart_id = $data_order->id;
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
}
