<?php

namespace App\Http\Controllers\admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    // Hiển thị danh sách sản phẩm
    public function index()
    {
        $products = Product::all(); // lấy hết dữ liệu
        return view('admin.products.index', compact('products'));
    }
    // Hiển thị form
    public function create()
    {
        $categories = Category::all(); // Lấy tất cả danh mục
        return view('admin.products.create', compact('categories'));
    }
    

// Lưu sản phẩm mới
public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string',
        'description' => 'nullable|string',
        'price' => 'required|numeric',
        'category_id' => 'required|exists:categories,id',
        'quantity' => 'required|integer|min:0',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'volume' => 'nullable|string|max:50',
    ]);
    $validated['is_featured'] = $request->has('is_featured');
    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads'), $imageName);
        $validated['image'] = $imageName;
    }

    Product::create($validated);

    return redirect()->route('admin.products.index')->with('success', 'Thêm sản phẩm thành công!');
}

// Hiển thị form chỉnh sửa
public function edit($id)
{
    $product = Product::findOrFail($id);
    $categories = Category::all();
    return view('admin.products.edit', compact('product', 'categories'));
}

// Cập nhật sản phẩm
public function update(Request $request, $id)
{
    $validated = $request->validate([
        'name' => 'required|string',
        'description' => 'nullable|string',
        'price' => 'required|numeric',
        'quantity' => 'required|integer|min:0',
        'category_id' => 'required|exists:categories,id',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        'volume' => 'nullable|string|max:50',
    ]);
    $product = Product::findOrFail($id);
    $validated['is_featured'] = $request->has('is_featured');
    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('uploads'), $imageName);
        $validated['image'] = $imageName;
    } else {
        $validated['image'] = $product->image;
    }
    
    $product->update($validated);
    


    return redirect()->route('admin.products.index')->with('success', 'Cập nhật thành công!');
}

//xóa 
public function destroy($id)
{
    $product = Product::findOrFail($id);
    $product->delete();

    return redirect()->route('admin.products.index')->with('success', 'Xoá sản phẩm thành công!');
}
//chi tiết sản phẩm
public function show($id)
{
    $product = Product::findOrFail($id);
    return view('admin.products.show', compact('product'));
}
//sp nổi bật
public function toggleFeatured(Request $request)
{
    $productId = $request->input('product_id');
    $isFeatured = $request->input('is_featured');
    $product = Product::findOrFail($productId);
    $product->is_featured = $isFeatured;
    $product->save();
    
    return response()->json(['success' => true]);
    
}


}

