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
        return view('admin.categories.category', compact('data'));
    }
    // Add category
    public function add_category(REQUEST $request)
    {
        $data = new Categories();
        $data->category_name = $request->category;

        $data->save();
        return redirect()->back()->with('message', 'Category Added Successfully');
    }
    // Delete category
    public function delete_category($id)
    {
        $data = Categories::find($id);

        $data->delete();
        return redirect()->back()->with('delete_category', 'Category Deleted Successfully');
    }

    // Add product
    public function view_product()
    {
        $category = Categories::all();
        return view('admin.products.product', compact('category'));
    }

    public function add_product(REQUEST $request)
    {
        $product = new Products();
        $product->title = $request->title;
        $product->description = $request->description;
        $product->quantity = $request->quantity;
        $product->price = $request->price;
        $product->category = $request->category;
        $product->discount_price = $request->dis_price;


        $image = $request->image; // lấy đối tượng ảnh từ request được gửi lên.
        $imagename = time() . '.' . $image->getClientOriginalExtension(); // tạo tên file mới cho ảnh dựa trên thời gian hiện tại và phần mở rộng của file gốc. 
        $request->image->move('upload', $imagename); // di chuyển ảnh gốc đến thư mục 'upload' trên server với tên file mới vừa được tạo ở trên.

        $product->image = $imagename;//cập nhật tên file ảnh mới vào trường 'image' của đối tượng sản phẩm ($product).
        
        $product->save(); // lưu thông tin sản phẩm đã được cập nhật vào cơ sở dữ liệu.
        return redirect()->back(); // trả về trang trước đó, tức là trang hiển thị thông tin sản phẩm vừa được chỉnh sửa.
    }

    public function list_product() {
        $products = Products::all();
        return view('admin.products.list_product',compact('products'));
    }
}
