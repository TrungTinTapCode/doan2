<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Hiển thị danh sách sản phẩm
    public function index()
    {
        $products = Product::all(); // lấy hết dữ liệu
        return view('products.index', compact('products'));
    }
    // Hiển thị form
public function create()
{
    return view('products.create');
}

// Lưu sản phẩm mới
public function store(Request $request)
{
    // Validate dữ liệu
    $validated = $request->validate([
        'name' => 'required|string',
        'description' => 'nullable|string',
        'price' => 'required|numeric',
    ]);

    // Tạo sản phẩm mới
    Product::create($validated);

    // Chuyển hướng về danh sách sản phẩm
    return redirect('/products')->with('success', 'Thêm sản phẩm thành công!');
}
// Hiển thị form chỉnh sửa
public function edit($id)
{
    $product = Product::findOrFail($id);
    return view('products.edit', compact('product'));
}

// Cập nhật sản phẩm
public function update(Request $request, $id)
{
    $validated = $request->validate([
        'name' => 'required|string',
        'description' => 'nullable|string',
        'price' => 'required|numeric',
    ]);

    $product = Product::findOrFail($id);
    $product->update($validated);

    return redirect('/products')->with('success', 'Cập nhật thành công!');
}
//xóa 
public function destroy($id)
{
    $product = Product::findOrFail($id);
    $product->delete();

    return redirect('/products')->with('success', 'Xoá sản phẩm thành công!');
}

}

