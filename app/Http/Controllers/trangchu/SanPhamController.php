<?php

namespace App\Http\Controllers\trangchu;

use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\View\View;

class SanPhamController extends Controller
{
    public function index()
    {
        $products = Product::all(); // hoặc where('is_active', 1) nếu cần
        return view('sanpham', compact('products'));
    }
}
