<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Products;
use App\Models\Orders;
use App\Notifications\SendEmailNotifiCation;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // Trang view
    public function view_category()
    {
        if (Auth::id()) {
            if (Auth::user()->usertype == '1') {
                $data = Categories::all();
                return view('admin.categories.category', compact('data'));
            } else {
                return view('404');
            }
        } else {
            return redirect('login');
        }
    }
    // Add category
    public function add_category(REQUEST $request)
    {
        $rules = [
            'category' => 'required | regex:/^[\pL\pM\s]+$/u',
        ];
        $message = [
            'category.required' =>'Không được bỏ trống',
            'category.regex' => 'Tên danh mục phải nhập chữ',
        ];
        $request->validate($rules,$message);
        $data = new Categories();
        $data->category_name = $request->category;

        $data->save();
        return redirect()->back()->with('message', 'Category Added Successfully');
    }
    // Update category
    public function update_category_view($id)
    {
        if (Auth::id()) {
            if (Auth::user()->usertype == '1') {
                $category = Categories::find($id);
                return view('admin.categories.update_category', compact('category'));
            } else {
                return view('404');
            }
        } else {
            return redirect('login');
        }
    }

    public function update_category(REQUEST $request, $id)
    {
        $rules = [
            'category' => 'required | regex:/^[\pL\pM\s]+$/u',
        ];
        $message = [
            'category.required' =>'Không được bỏ trống',
            'category.regex' => 'Tên danh mục phải nhập chữ',
        ];
        $request->validate($rules,$message);
        if (Auth::id()) {
            if (Auth::user()->usertype == '1') {
                $category = Categories::find($id);

                $category->category_name = $request->category;

                $category->save();
                return redirect()->back()->with('message', 'Category Updated Successfully');
            } else {
                return view('404');
            }
        } else {
            return redirect('login');
        }
    }
    // Delete category
    public function delete_category($id)
    {
        $data = Categories::find($id);

        $data->delete();
        return redirect()->back()->with('delete_category', 'Category Deleted Successfully');
    }

    // View product
    public function view_product()
    {
        if (Auth::id()) {
            if (Auth::user()->usertype == '1') {
                $category = Categories::all();
                return view('admin.products.product', compact('category'));
            } else {
                return view('404');
            }
        } else {
            return redirect('login');
        }
    }
    // Add Product
    public function add_product(REQUEST $request)
    {
        $rules = [
            'title' => 'required | regex:/^[\pL\pM\s]+$/u',
            'description' => 'required | min:10 | max:255',
            'quantity' => 'required | numeric ',
            'price' => 'required | numeric',
            'category' => 'required',
            'dis_price' => 'required | numeric',
            'image' => 'image',
        ];
        $message = [
            'required' =>'Không được bỏ trống',
            'regex' =>'Không được nhập số',
            'min' => 'Không được nhỏ hơn 10 ký tự',
            'max' => 'Không được nhập quá 255 ký tự',
            'numeric' => 'Không được nhập chữ',
            'image' => 'Ảnh không hợp lệ',
        ];
        $request->validate($rules,$message);
        if (Auth::id()) {
            if (Auth::user()->usertype == '1') {
                $product = new Products();
                $product->title = $request->title;
                $product->description = $request->description;
                $product->quantity = $request->quantity;
                $product->price = $request->price;
                $product->category = $request->category;
                $product->discount_price = $request->dis_price;

                $image = $request->image; // lấy đối tượng ảnh từ request được gửi lên.
                if ($image) {
                    $imagename = time() . '.' . $image->getClientOriginalExtension();
                    $request->image->move('upload', $imagename);

                    $product->image = $imagename; 
                }
                $product->save();
                return redirect()->back()->with('message', 'Product added successfully');
            } else {
                return view('404');
            }
        } else {
            return redirect('login');
        }
    }
    // List Product
    public function list_product()
    {
        if (Auth::id()) {
            if (Auth::user()->usertype == '1') {
                $products = Products::all();
                return view('admin.products.list_product', compact('products'));
            } else {
                return view('404');
            }
        } else {
            return redirect('login');
        }
    }
    // Update Product View
    public function update_product_view($id)
    {
        
        if (Auth::id()) {
            if (Auth::user()->usertype == '1') {
                $product = Products::find($id);
                $category = Categories::all();

                return view('admin.products.update_product', compact('product', 'category'));
            } else {
                return view('404');
            }
        } else {
            return redirect('login');
        }
    }
    public function update_product(REQUEST $request, $id)
    {
        $rules = [
            'title' => 'required | regex:/^[\pL\pM\s]+$/u',
            'description' => 'required | min:10 | max:255',
            'quantity' => 'required | numeric ',
            'price' => 'required | numeric',
            'category' => 'required',
            'dis_price' => 'required | numeric',
            'image' => 'image',
        ];
        $message = [
            'required' =>'Không được bỏ trống',
            'regex' =>'Không được nhập số',
            'min' => 'Không được nhỏ hơn 10 ký tự',
            'max' => 'Không được nhập quá 255 ký tự',
            'numeric' => 'Không được nhập chữ',
            'image' => 'Ảnh không hợp lệ',
        ];
        $request->validate($rules,$message);
        if (Auth::id()) {
            if (Auth::user()->usertype == '1') {
                $product = Products::find($id);

                $product->title = $request->title;
                $product->description = $request->description;
                $product->quantity = $request->quantity;
                $product->price = $request->price;
                $product->category = $request->category;
                $product->discount_price = $request->dis_price;

                $image = $request->image;
                if ($image) {
                    $imagename = time() . '.' . $image->getClientOriginalExtension();
                    $request->image->move('upload', $imagename);

                    $product->image = $imagename;
                }
                $product->save();
                return redirect()->back()->with('message', 'Product updated successfully');
            } else {
                return view('404');
            }
        } else {
            return redirect('login');
        }
    }
    // Delete Product
    public function delete_product($id)
    {
        $product = Products::find($id);

        $product->delete();
        return redirect()->back()->with('message', 'Product deleted successfully');
    }

    public function order_admin()
    {
        if (Auth::id()) {
            if (Auth::user()->usertype == '1') {
                $all_order = Orders::all();
                return view('admin.orders.order', compact('all_order'));
            } else {
                return view('404');
            }
        } else {
            return redirect('login');
        }
    }
    // Update trạng thái đơn hàng
    public function delivered(REQUEST $request, $id)
    {
        $order = Orders::find($id);
        $order->delivery_status = $request->delivery_status;
        $order->save();

        return redirect()->back();
    }
    // Gửi mail cho khách hàng
    public function send_email($id)
    {
        if (Auth::id()) {
            if (Auth::user()->usertype == '1') {
                $send_email = Orders::find($id);
                return view('admin.orders.send_email', compact('send_email'));
            } else {
                return view('404');
            }
        } else {
            return redirect('login');
        }
    }

    public function send_email_user(REQUEST $request, $id)
    {
        $send_email_user = Orders::find($id);

        $details = [
            'greeting' => $request->greeting,
            'firstline' => $request->firstline,
            'body' => $request->body,
            'button' => $request->button,
            'url' => $request->url,
            'lastline' => $request->lastline,
        ];

        Notification::send($send_email_user, new SendEmailNotification($details));
        return redirect()->back();
    }

    public function search(REQUEST $request)
    {
        $search = $request->search;

        $all_order = Orders::where('name', 'LIKE', "%$search%")
            ->orWhere('product_title', 'LIKE', "%$search%")
            ->get();

        return view('admin.orders.order', compact('all_order'));
    }
}
