<?php

namespace App\Http\Controllers\admin;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    // Hiển thị danh sách sản phẩm + Tìm kiếm sản phẩm
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->filled('keyword')) {
            $keyword = $request->keyword;
            $query->where(function ($q) use ($keyword) {
                $q->where('name', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('volume', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('price', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('quantity', 'LIKE', '%' . $keyword . '%');
            });
        }
        $categories = Category::with('products')->get();
        return view('admin.products.index', compact('categories'));

        $products = $query->get();

        return view('admin.products.index', compact('products'));
    }

    // Hiển thị form thêm sản phẩm
    public function create()
    {
        $categories = Category::all();
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

    // Xóa sản phẩm
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Xoá sản phẩm thành công!');
    }

    // Hiển thị chi tiết sản phẩm
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products.show', compact('product'));
    }

    // Toggle sản phẩm nổi bật
    public function toggleFeatured(Request $request)
    {
        $productId = $request->input('product_id');
        $isFeatured = $request->input('is_featured');
        $product = Product::findOrFail($productId);
        $product->is_featured = $isFeatured;
        $product->save();

        return response()->json(['success' => true]);
    }

    //tìm kiếm sản phẩm người dùng
    // Trong controller của bạn
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        
        // Thay đổi tên cột tương ứng với database của bạn
        $products = Product::where('name', 'LIKE', "%{$keyword}%")
                   ->orWhere('description', 'LIKE', "%{$keyword}%")
                   ->paginate(12);
        
        // Sử dụng template có sẵn thay vì tạo mới
        // Thử một tên view khác nếu bạn có sẵn (như 'sanpham')
        return view('sanpham', [
            'products' => $products,
            'keyword' => $keyword
        ]);
    }
}
