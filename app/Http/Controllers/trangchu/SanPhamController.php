<?php

namespace App\Http\Controllers\trangchu;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\View\View;
use App\Models\Comment;
class SanPhamController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('sanpham', compact('products'));
    }
    public function show($id)
    {
        $product = Product::findOrFail($id);
        // Lấy các comment của sản phẩm, sắp xếp mới nhất
        $comments = Comment::with('customer')
        ->where('product_id', $id)
        ->orderBy('created_at', 'desc')
        ->get();

        return view('chitiet_sanpham', compact('product', 'comments'));
    }
}
